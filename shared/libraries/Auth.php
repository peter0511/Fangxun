<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth {
    public $current_user = NULL;
    public $current_mobile = NULL;
    public $current_user_name = NULL;
    
    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model(array('MUser', 'MCustomers', 'MSms_verify'));
        $this->CI->load->library(array('score', 'YmtMemcached'));
        $this->CI->load->helper(array('array_helper', 'ymt'));
        $this->current_user = $this->CI->MUser->current();
        $this->current_mobile = $this->CI->input->cookie("customer_mobile");
        $this->current_user_name = $this->CI->input->cookie("customer_name");
        if(!$this->current_mobile && $this->current_user && $this->current_user['ceilphone']){
            $this->save_user_info('customer_mobile', $this->current_user['ceilphone']);
        }

        if(!$this->current_user_name && $this->current_user && $this->current_user['realname']){
            $this->save_user_info('customer_name', $this->current_user['realname']);
        }
        $res = $this->user_active_log();
        if ($res) {
            $action = $this->check_user_login_num($this->current_user['uid']) ? 'login_seven_www' : 'login_www';
            $this->CI->score->add($action, array('user_web_id' => $this->current_user['uid']));
        }
        if($this->current_user['enterprise_status']){
            $this->CI->load->model('MEcshop');
            $condition = array();
            $condition[] = array('user_web_id' => $this->current_user['uid']);
            $condition[] = array('status >' => C('status.delete'));
            $shop = $this->CI->MEcshop->query($condition, 0, 1, array('created_time' => 'DESC'));
            $shop = json_decode(json_encode($shop), TRUE);
            if($shop && $shop[0]){
                $this->current_user['shop_alias'] = $shop && $shop[0] ? $shop[0]['alias'] : '';
            }
        }
    }

     
    public function require_user() {
        $action = 'www_site_url';
        $url    = '';
        $this->CI->load->library('user_agent');
        if ($this->CI->agent->is_mobile()) {
            $action = 'wap_url';
            $url    = 'user/';
        }

        if($this->current_user) {
            if(!$this->current_user['customer_id']) {
                redirect($action($url . 'register'));
            }
        } else {
            $this->CI->session->set_flashdata('msg_error', '请您登录！');
            redirect($action($url . 'login'));
        }
    }

    public function login($user) {
        $this->CI->MUser->set_current($user);
    }

    public function logout() {
        $this->CI->MUser->set_current();
    }

    public function auto_register($mobile, $realname, $location, $source) {
        //check username avaliability
        $userinfo = array('realname' => $realname);
        $this->CI->load->helper(array('ymt', 'array'));
        do {
            $userinfo['username'] = '手机用户' . rand(100000, 999999);
        } while($this->CI->MUser->check_exists($userinfo['username']));
        $this->CI->load->model('MLocation');

        $userinfo['password'] = substr($mobile, -6);
        $userinfo['position'] = $location;
        $userinfo['ceilphone'] = $mobile;
        $userinfo['telephone'] = $mobile;
        $userinfo['province'] = $this->CI->MLocation->get_province($location);
        $userinfo['user_type'] = USER_USERTYPE_UNKNOWN;
        $userinfo['source'] = $source;
        $uid = $this->register($userinfo);

        if ($uid) {
            return $uid;
        } else {
            //todo: log error
            return 0;
        }
    }

    public function register($info, $current_user = 0) {
        if($this->check_mobile($info['mobile']) == FALSE || ($this->verify_code($info['mobile'], $info['code']) == FALSE)) {
            return FALSE;
        }

        $this->CI->load->model(array('MUser', 'MCustomers'));
        $res = $this->CI->MCustomers->info_by_mobile($info['mobile']);
        if($res) {
            $info['customer_id'] = $res['id'];
        } else {
            $info['customer_id'] = $this->CI->MCustomers->save($info);
        }

        $info['salt'] = ymt_randcode(6);
        $info['password'] = $this->password($info['password'], $info['salt']);

        $keys = array("username", "customer_id", "password", "salt", "telephone", "ceilphone", "position", "realname", "qq", "mail", "address", "business", "user_type");
        $setarr = elements($keys, $info);
        $setarr['province'] = isset($info['province_id']) ? $info['province'] : 0;
        $setarr['source'] = isset($info['source']) ? $info['source'] : 1;
        $setarr['last_time'] = $setarr['add_time'] = $this->CI->input->server('REQUEST_TIME');
        $setarr['last_ip'] = $setarr['add_ip'] = ymt_client_ip();
        $setarr['ceilphone'] = $info['mobile'];
        $setarr['username'] = $this->generate_username($info['customer_id']);

        if($current_user == 0) {
            $uid = $this->CI->MUser->save($setarr);
        } else {
            $uid = $current_user['uid'];
            $set = array(
                    'customer_id'   => $info['customer_id'], 
                    'ceilphone'     => $info['mobile'],
                    'salt'          => $info['salt'],
                    'password'      => $info['password']
                );
            $this->CI->MUser->update($set, $uid);
        }
        
        $verify_arr = array(
            'uid'               => $uid,
            'mobile'            => $info['mobile'],
            'verification_code' => $info['code'],
            'status'            => C('status.succ') 
        );
        $verify_arr['created_time'] = $verify_arr['updated_time'] = $this->CI->input->server('REQUEST_TIME');
        $this->CI->load->model('Mapp_Verify_Log');
        $this->CI->Mapp_Verify_Log->add($verify_arr);
        return $uid;
    }

    /*
     * 1.检查手机号是否合法
     * 2.检查手机号在customers表中是否存在
     * 合法和不存在 返回true
     * 否则返回false
     */
    public function check_mobile($mobile) {
        if(ymt_is_mobile($mobile) == FALSE) {
            return FALSE;
        }

        $res = $this->CI->MCustomers->info_by_mobile($mobile);
        if($res){
            $this->CI->load->model('MUser');
            $user = $this->CI->MUser->gets_by_limit(array('customer_id', 'status'), array($res['id'], C('status.succ')), 0 ,1);
            if($user){
                return FALSE;
            }else{
                return TRUE;
            }
        }else{
            return TRUE;
        }
    }


    /*
     * 生成新注册用户的username
     * 老用户绑定手机号不需要生成新的用户名
     * 新版注册用户的用户名前缀为YMT_
     */
    public function generate_username($customer_id) {
        return 'YMT_' . $customer_id;
    }

    function password($password, $salt) {
        return md5(md5($password).$salt);
    }

    public function save_user_info($key, $value = NULL){
        $cookies = array(
            "name" => $key,
            "value" => $value,
            "path" => "/",
            "expire" => 0
        );
        $this->CI->input->set_cookie($cookies);
    }
    
    /**
     * 添加用户登录记录
     *
     * @param  void
     * @return boolean
     * @author renwang
     */
    public function user_active_log() {
        if ( ! $this->current_user || $this->current_user['uid'] == 0) {
            return FALSE;
        }
        $this->CI->load->model('MUser_active_log');
        $data  = array(
            'user_web_id' => $this->current_user['uid'],
            'login_date'  => strtotime('today'),
            'status' => C('status.user_active_log.pass')
        );
        $count = $this->CI->MUser_active_log->count_by(array_keys($data), array_values($data));
        if ($count == 0) {
            $data['created_time'] = $data['updated_time'] = $this->CI->input->server('REQUEST_TIME');
            $id = $this->CI->MUser_active_log->add($data);
            return $id;
        }
        return FALSE;
    }

    /**
     * 检测用户连续登录天数
     *
     * @param  int $user_web_id 用户ID
     * @param  int $date_num 连续登录天数 默认7天
     * @return boolean
     * @author renwang
     */
    public function check_user_login_num($user_web_id, $date_num = 7) {
        $this->CI->load->model('MUser_active_log');
        $active_log = $this->CI->MUser_active_log->query(
            array(array('user_web_id' => $user_web_id, 'status' => C('status.user_active_log.pass'))), 
            0, $date_num, array('id' => 'DESC')
        );
        if ((count($active_log) == $date_num) && isset($active_log[$date_num - 1]->login_date)) {
            return (strtotime('today') - $active_log[$date_num - 1]->login_date) / (3600*24) == $date_num;
        }
        return FALSE;
    }

    /**
     * 判断短信验证码是否正确 
     *
     * @param  int $mobile 手机号
     * @param  int $code 用户输入的验证码
     * @return error-1:验证码已经过期
     *         success:通过验证
     *         error:验证未通过
     * @author wenzhiquan
     */
    public function verify_code($mobile, $code) {
        $query = $this->CI->MSms_verify->get_lastest_by_mobile($mobile);
        if(!$query){
            return C('status.json.error');
        }
        $result = $query[0];
        $mem_key = $mobile . '_' . $result->verification_code;
        //短信验证码只能验证5次，超过5次销毁
        if($ret = $this->CI->ymtmemcached->get($mem_key)) {
            if($ret <= 5) {
                $this->CI->ymtmemcached->set($mem_key, $ret+1, 600);
            } else {
                $this->modify_verified_status($mobile, $code);
                return C('status.json.error');
            }
        } else {
            $this->CI->ymtmemcached->set($mem_key, 1, 600);
        }
        if($result && $code == $result->verification_code) {
            $time = $this->CI->input->server('REQUEST_TIME');

            $interval = $time - $result->created_time;  //请求时间与数据库中验证码创建时间的间隔
            $valid_time = 600;                         //允许的最大时间间隔

            if($interval <= $valid_time) {
                //如果间隔小于最大间隔,返回成功消息,并调用verified函数
                return C('status.json.success');
            } else {
                //如果间隔大于最大间隔,返回error-1消息
                return C('status.json.error-1');
            }
        } else {
            //无结果或验证码不正确,返回error
            return C('status.json.error');
        }
    }

    public function modify_verified_status($mobile = 0, $code = 0) {
        if( ! $mobile || ! $code) {
            show_404();
        }
        return $this->CI->MSms_verify->modify_verified_status($mobile, $code);
    }
}

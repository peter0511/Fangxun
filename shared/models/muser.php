<?php
class MUser extends MY_Model {

    private $table = "users";
    public $logged_in = FALSE;

    function __construct() {
        parent::__construct($this->table);
        $this->user_current();
    }

    function current() {
        static $cur = NULL;
        if(is_null($cur)) {
            $uid = $this->session->userdata('uid');
            if(!empty($uid)) {
                $cur = file_get_contents('/Users/Peter/Work/test/Fangxun/shared/session/');
            }
        }
        return $cur;
    }

    public function set_current($user = NULL) {
        if(is_object($user)) {
            $data = array(
                'uid'      => $user->id,
                'name'     => $user->name,
                'position' => $user->position,
                'status'   => $user->status,
                'last_time' => $this->input->server('REQUEST_TIME'),
            );
            $this->session->set_userdata($data);
            redirect('user');
        } else if(is_null($user)) {
            $this->session->unset_userdata('uid');
        }
    }

    public function user_current(){
        $cookies = $this->session->all_userdata('uid');
        $cookies = (object)$cookies;
        return $cookies;
    }

    /**
     * is_complete
     * @return void
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function is_complete($uid = NULL)
    {
        if ($uid === NULL) {
            $user_info = $this->current();
        } else {
            $user_info = $this->info($uid);
        }
        
        if (
            $user_info
            && (
                $user_info['user_type'] == USER_USERTYPE_GR
                || $user_info['user_type'] == USER_USERTYPE_JJR
                || $user_info['user_type'] == USER_USERTYPE_ZZH
                || $user_info['user_type'] == USER_USERTYPE_QY
                || $user_info['user_type'] == USER_USERTYPE_JXS
               )
           ) {
            return TRUE;
        }

        return FALSE;
    }

    function check_exists($username) {
        $this->db->where(array('username' => $username));
        return $this->db->from($this->table)->count_all_results();
    }

    function count($query_type = '', $query_word = '') {
        if(!empty($query_type) && !empty($query_word)) {
            $this->db->where($query_type, $query_word);
        }
        return $this->db->where('status', 1)->count_all_results($this->table);
    }

    function list_user($start = 0, $size = 20, $query_type = '', $query_word = '') {
        if(!empty($query_type) && !empty($query_word)) {
            $this->db->where($query_type, $query_word);
        }
        $this->db->where('status', 1)->order_by('uid', 'DESC');
        return $this->db->get($this->table, $size, $start)->result();
    }

    public function count_reporter_for_admin() {
        if(!empty($query_type) && !empty($query_word)) {
            $this->db->where($query_type, $query_word);
        }
        return $this->db->where('reporter >', 0)->where('status', 1)->count_all_results($this->table);
    }

    public function list_reporter_for_admin($start = 0, $size = 20, $query_type = '', $query_word = '') {
        if(!empty($query_type) && !empty($query_word)) {
            $this->db->where($query_type, $query_word);
        }
        $this->db->where('reporter >', 0)->where('status', 1)->order_by('uid', 'DESC');
        return $this->db->get($this->table, $size, $start)->result();
    }

    function get_user_by_positions($positions) {
        if(! is_array($positions) || ! $positions) {
            return FALSE;
        }
        $this->db->select("uid");
        $this->db->where_in('position', $positions);
        $users = $this->db->get($this->table)->result_array();
        return $users;
    }

    function login($username, $password) {
        $this->db->select("salt");
        $this->db->where(array('username' => $username));
        $salt = $this->db->get($this->table)->result_array();
        if(! $salt) {
            return false;
        }

        $password = $this->password($password, $salt[0]['salt']);
        $where = array("username" => $username, "password" => $password, "status" => 1);
        $this->db->where($where);
        $user_info = $this->db->get($this->table)->result_array();
        if(! $user_info) {
            return false;
        }
        $user_info = $user_info[0];

        /*
        $setarr = array();
        $setarr['last_time'] = $this->input->server('REQUEST_TIME');
        $setarr['last_ip'] = ymt_client_ip();

        $this->db->where(array('uid' => $user_info['uid']));
        $this->db->update($this->table, $setarr);
         */

        return $user_info;
    }

    function register($info) {
        if( $this->check_exists($info['username']) ) {
            return false;
        }

        $info['salt'] = ymt_randcode(6);
        $info['password'] = $this->password($info['password'], $info['salt']);

        $keys = array("username", "password", "salt", "telephone", "ceilphone", "position", "realname", "qq", "mail", "address", "business", "user_type");
        $setarr = elements($keys, $info);
        $setarr['province'] = isset($info['province_id']) ? $info['province'] : 0;
        $setarr['source'] = isset($info['source']) ? $info['source'] : 1;
        $setarr['last_time'] = $setarr['add_time'] = $this->input->server('REQUEST_TIME');
        $setarr['last_ip'] = $setarr['add_ip'] = ymt_client_ip();

        $this->db->insert($this->table, $setarr);
        return $this->db->insert_id();
    }

    function infos_for_admin($arr_uid) {
        $this->db->where_in('uid', $arr_uid);
        $info = $this->db->get_where($this->table, array('status' => 1))->result();
        if($info[0]) {
            //$info[0]['show_type'] = $this->show_type($info[0]['user_type']);
            return $info;
        }
        return FALSE;
    }

    function save($userinfo){
        $this->db->insert($this->table, $userinfo);
        return $this->db->insert_id();
    }

//    function info($uid, $cached = TRUE) {
//        $this->load->library('YmtMemcached');
//        $mkey = "muser::info_{$uid}";
//        $res = $this->ymtmemcached->get($mkey);
//        if ($res && $cached) {
//            return $res;
//        }
//        $info = $this->db->get_where($this->table, array('uid' => $uid, 'status' => 1))->result_array();
//        if($info) {
//            $info[0]['show_type'] = $this->show_type($info[0]['user_type']);
//            $this->ymtmemcached->set($mkey, $info[0]);
//            return $info[0];
//        }
//        return FALSE;
//    }

//    public function reset_memcache($uid) {
//        $this->load->library('YmtMemcached');
//        $this->ymtmemcached->del("muser::info_$uid");
//    }

    function get_by_username($username) {
        return $this->db->where('username', $username)->where('status', 1)->get($this->table)->first_row();
    }

    function get_by_customer_id($customer_id) {
        return $this->db->where('customer_id', $customer_id)->where('status', 1)->get($this->table)->first_row();
    }

    function get_by_uid($uid) {
        return $this->db->where('uid', $uid)->where('status', 1)->get($this->table)->first_row();
    }


    function resetpassword($uid) {
        $info = $this->info($uid);
        $setarr = array('password' => $this->password('123456', $info['salt']));
        $this->db->update($this->table, $setarr, array('uid' => $uid));
        $this->reset_memcache($uid);
        return $this->db->affected_rows();
    }

    function repassword($info) {
        $info['old_password'] = $this->password($info['old_password'], $info['salt']);

        $where = array('username' => $info['username'], 'password' => $info['old_password']);
        $setarr['password'] = $this->password($info['password'], $info['salt']);
        $this->db->update($this->table, $setarr, $where);
        $this->reset_memcache($info['uid']);
        return $this->db->affected_rows();
    }

    function backpassword($info) {
        $this->db->where('uid', $info['uid']);
        $setarr['password'] = $this->password($info['password'], $info['salt']);
        $setarr['last_time'] = $this->input->server('REQUEST_TIME');
        $this->db->update($this->table, $setarr);
        $this->reset_memcache($info['uid']);
        return $this->db->affected_rows();
    }

    function edit($info) {
        $where = array('uid' => $info['uid']);
        $keys = array('realname', 'username', 'telephone', 'position', 'address', 'qq', 'user_type', 'province');
        $setarr = elements($keys, $info, NULL);
        $this->db->update($this->table, $setarr, $where);
        $this->reset_memcache($info['uid']);
        return $this->db->affected_rows();
    }

    function update($setarr, $uid) {
        $this->db->update($this->table, $setarr, array('uid' => $uid));
        $this->reset_memcache($uid);
        return $this->db->affected_rows();
    }

    function honest($uid, $status=1) {
        $this->db->update($this->table, array('honest' => $status), array('uid' => $uid));
        $this->reset_memcache($uid);
        return $this->db->affected_rows();
    }

    function password($password, $salt) {
        return md5(md5($password).$salt);
    }

    function del($id) {
        $data = array('status' => 0);
        $this->db->where('uid', $id);
        $res = $this->db->update($this->table, $data);
        $this->reset_memcache($id);
        return ($res !== FALSE)? 1 : 0;
    }

    function show_type($type) {
        $types = array(1 => "个人", 2 => "农业经纪人", 3 => "种植户/养殖户", 4 => "企业", 5 => "其他", 6 => "批发经销商");
        return array_key_exists($type, $types) ? $types[$type] : '';
    }

    public function vip($id) {
        $info = $this->info($id);
        if(empty($info)) return 0;
        if($info['vip']) {
            $this->db->where('uid', $id)->update($this->table, array('vip' => 0, 'vip_count' => 0, 'vip_time' => 0));
        } else {
            $this->db->where('uid', $id)->update($this->table, array('vip' => 1, 'vip_count' => 100, 'vip_time' => $this->input->server('REQUEST_TIME')));
        }
        $this->reset_memcache($id);
        return $this->db->affected_rows();
    }

    public function enterprise($id, $val=1) {
        //return false;
        $info = $this->info($id);
        if(empty($info)) return 0;
        $this->db->where('uid', $id)->update($this->table, array('enterprise_status' => $val));
        $this->reset_memcache($id);
        return $this->db->affected_rows();
    }

    function set_message($uid, $type) {
        /*
         * 1: supply for buy 采购报价
         * 2: auto match 供求匹配
         * 4: auto push 主营产品推送
         */
        return 1;
        $this->db->where('uid', $uid);
        if ($type > 0) {
            $this->db->set('message', "message | {$type}", FALSE);
        }
        elseif ($type < 0) {
            $type = ~(abs($type));
            $this->db->set('message', "message & {$type}", FALSE);
        }
        else {
            $this->db->set('message', 0);
        }
        $this->db->update($this->table);
        return $this->db->affected_rows();
    }

    public function get_by_field($field, $value) {
        $res = NULL;
        if(in_array($field, array('username', 'telephone', 'ceilphone', 'qq', 'mail'))) {
            if(!empty($value)) {
                $res = $this->db->where($field, $value)->get($this->table)->first_row();
            }
        }
        return $res;
    }

    public function update_reputation_by_uid($id,$value){
        $sql = '';
        $change = $value < 0 ? $value : '+ ' .$value;
        $sql ="UPDATE {$this->table} SET reputation = reputation {$change} WHERE uid = {intval($id)} ";
        return $this->db->query($sql);
    }

    public function set_users_reporter($applyid, $reporter = 1) {
        $this->db->update($this->table, array('reporter' => $reporter), array('uid' => $applyid));
        return $this->db->affected_rows();
    }

    /**
     * 通过in查询
     *
     * @param  int $field 字段名称
     * @param  array $array 条件数组
     * @return object
     * @author renwang
     */
    public function get_by_in($field, $array) {
        $this->db->where_in($field, $array);
        $res = $this->db->get($this->table);
        return $res->result();
    }
    /**
     * join查询
     * @param  [string] $table [join表名]
     * @param  [array] $cond [条件限制]
     * @param  string $type [join类型]
     * @return [array] [查询的返回数据]
     * @author wangyunji
     * @date   2015-05-22
     */

    public function selectjoin($table, $cond, $type = 'INNER')
    {
        $res = $this->db->join($table, $cond, $type);
        $res = $this->db->get($this->table)->result('array');
        return $res;
    }
}

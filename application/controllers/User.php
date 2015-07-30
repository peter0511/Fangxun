<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    protected $permissions;

    function __construct() {
        parent::__construct();
        $this->load->library(array('Auth', 'Pagination'));
        $this->user = $this->auth->logined();
        $this->permissions = $this->user->position;
    }

	public function index($tab = 0) { 
        $this->load->model('Muser');
        $page_size = 2;
        if ($this->user->position < C('user.position.code.zishengzhiyeguwen')) {
            $item = array(
                'status' => C('user.yuangong.code'),
            );
            $users = $this->Muser->query(array($item), $tab, $page_size);
            //$users = $this->Muser->query(array($item));
        } else {
            $item = array(
                'position <' => C('user.position.code.dianzhu'), 
                'status' => C('user.yuangong.code.zaizhi'),
            );
            $users = $this->Muser->query(array($item), $tab, $page_size);
        }
        $this->pagination->initialize(array(
            'per_page'    => $page_size,
            'base_url'    => site_url('user/index'),
            'uri_segment' => 3,
            'total_rows'  => $this->Muser->count(array($item)),
            //'suffix' => $keyword ? sprintf('?keyword=%s', $keyword) : '    ',
        ));
        $data = array();
        foreach ($users as $value) {
            $data['user'][] = array(
                'id'   => $value->id,
                'name' => $value->name,
                'sex'  => C('user.sex.text.' . $value->sex),
                'mobile' => $value->mobile,
                'position' => C('user.position.text.' . $value->position),
                'status' => C('user.yuangong.text.' . $value->status),
                'create' => date('Y-m-d', $value->created),
                'user' => $this->user->position,
            );
        }
        $data['pager'] = $this->pagination->create_links(); 
		$this->load->view('User/index', $data);
        $this->load->view('Common/footer');
	}

	public function add() {
        if ($this->permissions > C('user.position.code.zishengzhiyeguwen')) {
            redirect('user');
        }
        //$this->load->library(array('form_validation'));
        $this->load->helper('form');
        $Muser = $this->load->model('Muser');
        $user = $this->Muser->end1(0, 1, array('id' => 'DESC'));
        $status = C('user.yuangong.text');
        $education = C('user.education.text');
        $sex = C('user.sex.text');
        $position = C('user.position.text');
        $data = array();
        $data = array(
            'status'    => $status,
            'education' => $education,
            'sex'       => $sex,
            'position'  => $position,
        );
        $data['id'] = 0;
        if (!empty($user)) {
            foreach ($user as $value) {
                $id = $value->id;
            }
            $data['id'] = $id + 1;
        }
        //$this->form_validation->set_rules('username', '登陆邮箱', 'required|greater_than[0]');
        //$this->form_validation->set_rules('name', '真实姓名', 'required|greater_than[0]');
        //$this->form_validation->set_rules('password', '登陆密码', 'required|greater_than[0]');
        //$this->form_validation->set_rules('age', '出生日期', 'required|greater_than[0]');
        //$this->form_validation->set_rules('native', '籍贯', 'required|greater_than[0]');
        //$this->form_validation->set_rules('mobile', '个人电话', 'required|greater_than[0]');
        //$this->form_validation->set_rules('education', '学历', 'required|greater_than[0]');
        //$this->form_validation->set_rules('identity', '身份证号', 'required|greater_than[0]');
        //$this->form_validation->set_rules('address', '家庭地址', 'required|greater_than[0]');
        //$this->form_validation->set_rules('phone', '应急电话', 'required|greater_than[0]');
        //$this->form_validation->set_message('greater_than', '请填写 %s');
		$this->load->view('User/create',$data);
        $this->load->view('Common/footer');
	}
    
    public function ajax_save_user() {
        $this->load->model('Muser');
        $this->load->library(array('form_validation', 'encrypt'));
        $str = $this->input->post('input', TRUE);
        $input = preg_replace("/[+]/","", $str);
        $inputs = explode('&', $input);
        $data = array();
        $data = array(
            'created'   => $this->input->server('REQUEST_TIME'),
            'updated'   => $this->input->server('REQUEST_TIME'),
        );
        foreach ($inputs as $value) {
            $inputsa = explode('=', $value);
            $data[$inputsa[0]] = trim($inputsa[1]);
        }
        if (!isset($data['agree'])) {
            $res['msg'] = '亲,你还不确定吗?你再重写吧!';
            $this->_return_json($res);
        }
        if (strlen(trim($data['password'])) < 8 || strlen(trim($data['password'])) > 16) {
            $res['msg'] = '你设置密码格式不对哦!亲!';
            $this->_return_json($res);
        }
        if (!isset($data['username'])) {
            $res['msg'] = '亲,你不给用户名?我就不让加入团队!';
            $this->_return_json($res);
        }
        //if (!isset($data['name']) || !isset($data['age']) || !isset($data['sex']) || !isset($data['native']) || !isset($data['mobile']) || !isset($data['education']) || !isset($data['identity']) || !isset($data['address']) || !isset($data['phone']) || !isset($data['position']) || !isset($data['status'])) {
        //    $res['msg'] = '亲,你看看还有什么没填,这可是你的员工信息啊!';
        //    $res = json_encode($res);
        //    echo $res;
        //    exit;
        //}
        $return = sha1($data['password']);
        $return = $this->encrypt->encode($return);
        $data['password'] = $return;
        unset($data['agree']);
        unset($data['id']);
        $rest = $this->Muser->save($data);
        if ($rest) {
            $res['msgs'] = '亲,你们的队伍又庞大了,曾攀发来贺';
            $this->_return_json($res);
        }
    }
}


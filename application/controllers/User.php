<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function index() { 
        
		$this->load->view('User/index');
        $this->load->view('Common/footer');
	}

	public function add() {
        //$this->load->library(array('form_validation'));
        $this->load->helper('form');
        $Muser = $this->load->model('Muser');
        $user = $this->Muser->end1(0, 1, array('id' => 'DESC'));
        foreach ($user as $value) {
            $id = $value->id;
        }
        $status = C('status.yuangong.text');
        $education = C('status.education.text');
        $sex = C('status.sex.text');
        $position = C('status.position.text');
        $data = array(
            'status'    => $status,
            'education' => $education,
            'sex'       => $sex,
            'position'  => $position,
            'module'    => array(''),
            'id'        => $id + 1,
        );
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
        foreach ($inputs as $value) {
            $inputsa = explode('=', $value);
            $data[$inputsa[0]] = trim($inputsa[1]);
        }
        if (!isset($data['agree'])) {
            $res['msg'] = '亲,你还不确定吗?你再重写吧!';
            $res = json_encode($res);
            echo $res;
            exit;
        }
        //if (strlen(trim($data['password'])) < 8 || strlen(trim($data['password'])) > 16) {
        //    $res['msg'] = '你设置密码格式不对哦!亲!';
        //    $res = json_encode($res);
        //    echo $res;
        //    exit;
        //}
        //if (!isset($data['username'])) {
        //    $res['msg'] = '亲,你不给用户名?我就不让加!';
        //    $res = json_encode($res);
        //    echo $res;
        //    exit;
        //}
        //if (!isset($data['name']) || !isset($data['age']) || !isset($data['sex']) || !isset($data['native']) || !isset($data['mobile']) || !isset($data['education']) || !isset($data['identity']) || !isset($data['address']) || !isset($data['phone']) || !isset($data['position']) || !isset($data['status'])) {
        //    $res['msg'] = '亲,你看看还有什么没填,这可是你的员工信息啊!';
        //    $res = json_encode($res);
        //    echo $res;
        //    exit;
        //}
        $return = $this->encrypt->encode($data['password']);
        $return = sha1($return);
        $data['password'] = $return;
        unset($data['agree']);
        unset($data['id']);
        $this->Muser->save($data);
    }
}


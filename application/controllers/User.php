<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function index() { 
        
		$this->load->view('User/index');
        $this->load->view('Common/footer');
	}

	public function add() {
        $Muser = $this->load->model('Muser');
        //$id = $this->Muser->query(array(), 0, 1, array('id' => 'DESC'));
        $id = $this->Muser->get('0');
        echo '<pre>'; var_dump($user_id); echo '</pre>'; die();


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
        );
		$this->load->view('User/create',$data);
        $this->load->view('Common/footer');
	}
    
    public function ajax_save_user() {
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation', 'encrypt'));

        $input = $this->input->post('input', TRUE);
        $inputs = explode('&', $input);
        foreach ($inputs as $value) {
            $inputsa = explode('=', $value);
            $data[$inputsa[0]] = $inputsa[1];
        }
        if (!isset($data['agree'])) {
            $res['msg'] = '亲,你还不确定吗?你再重写吧!';
            $res = json_encode($res);
            echo $res;
            exit;
        }
        if (strlen($data['password']) > 8 && strlen($data['password']) < 16) {
            $res['msg'] = '你没设置密码啊!亲!';
            $res = json_encode($res);
            echo $res;
            exit;
        }
        $return = $this->encrypt->encode($data['password']);
        $return = sha1($data);
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    }
}


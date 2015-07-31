<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->Model(array('Mlocation'));
        $this->load->library(array('Auth', 'Pagination'));
        $this->user = $this->auth->logined();
        if (!isset($this->user->uid)) {
            redirect('login');
        }
        $this->permissions = $this->user->position;
    }

	public function index() {
        $this->load->model('Mlocation');
        $this->load->library(array('form_validation', 'encrypt'));
        $location = $this->Mlocation->query(array(array('upid' => 0)));
        foreach ($location as $value) {
            $data['town'][] = array(
                'name' => $value->name,
                'id'   => $value->id,
                'upid' => $value->upid,
                'path' => $value->path,
            );
            
        }
		$this->load->view('address', $data);
        $this->load->view('Common/footer');
	}

    public function ajax_save_address() {
        $this->load->model(array('MUser', 'Mlocation'));
        $user = $this->MUser->geto($this->user->uid);
        $this->load->library(array('form_validation', 'encrypt'));
        $str = $this->input->post('input', TRUE);
        $input = preg_replace("/[+]/","", $str);
        $inputs = explode('&', $input);
        $data = array();
        foreach ($inputs as $value) {
            $inputsa = explode('=', $value);
            $data[$inputsa[0]] = trim($inputsa[1]);
        }
        if (empty($data['community']) || empty($data['street'])) {
            $res['msg'] = '别逗我啊,你有没有填写的吧';
            $this->_return_json($res);
        }

        if (is_numeric($data['street'])) {
            $item = array();
            $item = array(
                'upid' => $data['street'],
                'path' => $data['town'] . '-' . $data['street'],
                'name' => $data['community'],
                'user_id' => $user->id,
                'created' => $this->input->server('REQUEST_TIME'),
                'updated' => $this->input->server('REQUEST_TIME'),
            );
            $rest = $this->Mlocation->add($item);
            if ($rest) {
                $res['msgs'] = '亲,已经给你加上了,你再去看看吧';
                $this->_return_json($res);
            }
        } else {
            $item = array();
            $item = array(
                'upid' => $data['town'],
                'path' => $data['town'],
                'name' => $data['street'],
                'user_id' => $user->id,
                'created' => $this->input->server('REQUEST_TIME'),
                'updated' => $this->input->server('REQUEST_TIME'),
            );
            $rest = $this->Mlocation->add($item);
            if ($rest) {
                $val = array();
                $val = array(
                    'upid' => $rest,
                    'path' => $data['town'] . '-' . $rest,
                    'name' => $data['community'],
                    'user_id' => $user->id,
                    'created' => $this->input->server('REQUEST_TIME'),
                    'updated' => $this->input->server('REQUEST_TIME'),
                );
                $value = $this->Mlocation->add($val);
                if ($value) {
                    $res['msgs'] = '亲,已经给你加上了,你再去看看吧';
                    $this->_return_json($res);
                }
            }
            
        }
    }

    public function select_address() {
        $this->load->model('Mlocation');
        $address = $this->input->get('address', TRUE);
        $street = $this->Mlocation->query(array(array('upid' => $address)));
        $this->_return_json($street);
    } 
}

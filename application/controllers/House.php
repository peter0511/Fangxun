<?php defined('BASEPATH') OR exit('No direct script access allowed');

class House extends MY_Controller {
    protected $user;

    public function __construct() {
        parent::__construct();
        $this->load->Model(array('Mlocation'));
        $this->load->library('Auth');
        $this->user = $this->auth->logined();
        if (!isset($this->user->uid)) {
            redirect('login');
        }
    }

	public function index() {
		$this->load->view('House/index');
        $this->load->view('Common/footer');
	}

	public function add() {
        $this->load->model('Mlocation');
        $house = C('house.house.text');
        $data = array();
        $location = $this->Mlocation->query(array(array('upid' => 0)));
        $data = array(
            'house' => $house,
        );
        foreach ($location as $value) {
            $data['town'][] = array(
                'name' => $value->name,
                'id'   => $value->id,
                'upid' => $value->upid,
            );
        }
		$this->load->view('House/create', $data);
        $this->load->view('Common/footer');
	}

	public function address() {
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
		$this->load->view('House/address', $data);
        $this->load->view('Common/footer');
	}

    public function ajax_save_address() {
        $this->load->model(array('Muser', 'Mlocation'));
        $user = $this->Muser->geto($this->user->uid);
        $this->load->library(array('form_validation', 'encrypt'));
        $str = $this->input->post('input', TRUE);
        $input = preg_replace("/[+]/","", $str);
        $inputs = explode('&', $input);
        $data = array();
        foreach ($inputs as $value) {
            $inputsa = explode('=', $value);
            $data[$inputsa[0]] = trim($inputsa[1]);
        }
        if (empty($data['communty']) && empty($data['street'])) {
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

    public function ajax_save_house() {
        $this->load->model(array('MHouse', 'MLandlord'));
        $str = $this->input->post('input', TRUE);
        $input = preg_replace("/[+]/","", $str);
        $inputs = explode('&', $input);
        $user = $this->Muser->geto($this->user->uid);
        $data = array();
        foreach ($inputs as $value) {
            $inputsa = explode('=', $value);
            $data[$inputsa[0]] = trim($inputsa[1]);
        }
        if (!isset($data['agree'])) {
            $res['msg'] = '亲,你还不确定吗?你再重写吧!';
            $this->_return_json($res);
        }
        if (strlen(trim($data['identity'])) == 18) {
            $res['msg'] = '你的写的身份证不对吧!亲';
            $this->_return_json($res);
        }
        unset($data['agree']);
        $res = array();
        $res = array(
            'user_id' => $user->id,
            'mobile' => $data['mobile'],
        );
        $landlord = $this->MLandlord->query(array($res));
        $item = array();
        $item = array(
            'user_id' => $user->name,
            'town_id' => $data['town'],
            'street_id' => $data['street'],
            'community_id' => $data['community'],
            'address' => $data['address'],
            'expect' => $data['expect'],
            'condition' => $data['condition'],
            'status' => $data['status'],
            'created' => $this->input->server('REQUEST_TIME'),
            'updated' => $this->input->server('REQUEST_TIME'),
        );
        if (! $landlord) {
            $res = array(
                'user_id' => $user->id,
                'mobile' => $data['mobile'],
                'landlord_name' => $data['name'],
                'site' => $data['site'],
                'created' => $this->input->server('REQUEST_TIME'),
                'updated' => $this->input->server('REQUEST_TIME'),
            );
            $land = $this->MLandlord->add($res);
            $item['landlord_id'] = $land;
        } else {
            foreach ($landlord as $value) {
                $this->MLandlord->update($value->id, array('updated' => $this->input->server('REQUEST_TIME')));
                $item['landlord_id'] = $value->id;
            }
        }
        $valu = $this->MHouse->add($item);
        if ($value) {
            $res['msgs'] = '亲,已经给你加上了,你再去看看吧';
            $this->_return_json($res);
        }
    }

    public function select_address() {
        $this->load->model('Mlocation');
        $address = $this->input->get('address', TRUE);
        $street = $this->Mlocation->query(array(array('upid' => $address)));
        $this->_return_json($street);
    } 
}

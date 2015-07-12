<?php defined('BASEPATH') OR exit('No direct script access allowed');

class House extends MY_Controller {
    protected $user;
    protected $permissions;

    public function __construct() {
        parent::__construct();
        $this->load->Model(array('Mlocation'));
        $this->load->library('Auth');
        $this->user = $this->auth->logined();
        if (!isset($this->user->uid)) {
            redirect('login');
        }
        $this->permissions = $this->user->position;
    }

	public function index() {
        $this->load->model(array('MHouse', 'Mlocation'));
        if ($this->user->position < C('user.position.code.zishengzhiyeguwen')) {
            $house = $this->MHouse->query(array(array('status' => C('house.house.code'))), 0, 0, array('updated' => 'DESC'));
        } else {
            $users = $this->Muser->query(array(array('position' => C('user.position.code.zishengzhiyeguwen'), 'status' => C('user.yuangong.code.zaizhi'))));
            $house = $this->MHouse->query(array(array('status' => C('house.house.code'))), 0, 0, array('updated' => 'DESC'));
        }
        $data = array();
        foreach ($house as $value) {
            $town = $this->Mlocation->geto($value->town_id);
            $street = $this->Mlocation->geto($value->street_id);
            $community = $this->Mlocation->geto($value->community_id);
            $data['house'][] = array(

            );
        }

		$this->load->view('House/index');
        $this->load->view('Common/footer');
	}

	public function add() {
        $this->load->model('Mlocation');
        $house = C('house.house.text');
        $appliance = C('house.appliance.text');
        $decoration = C('house.decoration.text');
        $data = array();
        $location = $this->Mlocation->query(array(array('upid' => 0)));
        $data = array(
            'house' => $house,
            'appliance' => $appliance,
            'decoration' => $decoration,
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

    public function ajax_save_house() {
        $this->load->model(array('MHouse', 'MLandlord', 'MUser'));
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
        unset($data['agree']);

        $rest = array(
            'location' => $data['town'] . '.' . $data['street'] . '.' . $data['community'],
            'address'=> $data['build'] . '-' . $data['element'] . '-' . $data['house'],
        );
        $house = $this->MHouse->query(array($res));
        if ( ! $house) {
            $rest['user_id'] = $user->id;
            $rest['expect'] = $data['expect'];
            $rest['agency'] = $data['agency'];
            $rest['decoration'] = $data['decoration'];
            $rest['appliance'] = $data['appliance'];
            $rest['birth'] = $data['birth'];
            $rest['area'] = $data['area'];
            $rest['house_type'] = $data['room'] . '_' . $data['hall'] . '_' . $data['toilet'];
            $rest['orientation'] = $data['orientation'];
            $rest['storey'] = $data['storey'];
            $rest['condition'] = $data['condition'];
            $rest['status'] = $data['status'];
            $rest['created'] = $this->input->server('REQUEST_TIME');
            $rest['updated'] = $this->input->server('REQUEST_TIME');
            $houses = $this->MHouse->add($rest);
        } else{
            foreach ($house as $value) {
                $user = $this->Muser->geto($value->user_id);
                if ($value) {
                    $res['msgs'] = '亲,这条数据已有,你可以去问问' . $user->name . ',继续加油哦!';
                    $this->_return_json($res);
                }
            }
        }
        $lord = $this->MLandlord->geto($data['mobile']);
        if ( ! $lord) {
            $item = array(
                'user_id' => $user->id,
                'mobile' => $data['mobile'],
                'landlord_name' => $data['name'],
                'site' => $data['site'],
                'house_id' => $house,
                'created' => $this->input->server('REQUEST_TIME'),
                'updated' => $this->input->server('REQUEST_TIME'),
            );
            $item['identity'] = empty($data['identity']) ? '' : $data['identity'];
            $land = $this->MLandlord->add($item);
        } else {
            $this->MLandlord->update($lord->id, array('updated' => $this->input->server('REQUEST_TIME'), 'house_id' => $lord->house_id . '~' . $lond));
        }
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

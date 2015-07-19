<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Family extends MY_Controller {
    protected $user;
    protected $permissions;

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

	public function index($tab = 0) {
		$this->load->view('family/index');
        $this->load->view('Common/footer');
	}

    public function init($tab = 0) {
		$this->load->view('family/index');
        $this->load->view('Common/footer');
    }

	public function add() {
        $this->load->model('Mlocation');
        $house = C('house.house.text');
        $appliance = C('house.appliance.text');
        $decoration = C('house.decoration.text');
        $property = C('house.property.text');
        $property_type = C('house.property_type.text');
        $structure = C('house.structure.text');
        $house_type = C('house.house_type.text');
        $data = array();
        $location = $this->Mlocation->query(array(array('upid' => 0)));
        $data = array(
            'house' => $house,
            'appliance' => $appliance,
            'decoration' => $decoration,
            'property' => $property,
            'property_type' => $property_type,
            'structure' => $structure,
            'house_type' => $house_type,
        );
        foreach ($location as $value) {
            $data['town'][] = array(
                'name' => $value->name,
                'id'   => $value->id,
                'upid' => $value->upid,
            );
        }
		$this->load->view('family/create', $data);
        $this->load->view('Common/footer');
	}

    public function ajax_save_house() {
        $this->load->model(array('MHouse', 'MLandlord', 'MUser'));
        $str = $this->input->post('input', TRUE);
        $input = preg_replace("/[+]/","", $str);
        $inputs = explode('&', $input);
        $data = array();
        foreach ($inputs as $value) {
            $inputsa = explode('=', $value);
            $data[$inputsa[0]] = trim($inputsa[1]);
        }
        $user = $this->Muser->geto($this->user->uid);
        if (!isset($data['agree'])) {
            $res['msg'] = '亲,你还不确定吗?你再重写吧!';
            $this->_return_json($res);
        }
        unset($data['agree']);

        $rest = array();
        $rest = array(
            'location' => $data['town'] . '.' . $data['street'] . '.' . $data['community'],
            'address' => $data['build'] . '-' . $data['element'] . '-' . $data['house'],
        );
        $house = $this->MHouse->query(array($rest));
        if ( ! $house) {
            $rest['user_id'] = $user->id;
            $rest['d_expect'] = $data['d_expect'];
            $rest['agency'] = $data['cash'];
            $rest['decoration'] = $data['decoration'];
            $rest['appliance'] = $data['appliance'];
            $rest['birth'] = $data['birth'];
            $rest['area'] = $data['area'];
            $rest['house_type'] = $data['room'] . '_' . $data['hall'] . '_' . $data['toilet'];
            $rest['orientation'] = $data['orientation'];
            $rest['storey'] = $data['storey'];
            $rest['property_structure'] = $data['property'] . ',' . $data['property_type'] . ',' . $data['house_type'] . ',' . $data['structure'];
            $rest['condition'] = $data['condition'];
            $rest['created'] = $this->input->server('REQUEST_TIME');
            $rest['updated'] = $this->input->server('REQUEST_TIME');
            $rest['loan'] = $data['loan'];
            $rest['status'] = C('house.house.sale_code.weishou');
            $houses = $this->MHouse->add($rest);
            $lord = $this->MLandlord->get_byo('mobile', $data['mobile']);
            if ( ! $lord) {
                $item = array(
                    'user_id' => $user->id,
                    'mobile' => $data['mobile'],
                    'landlord_name' => $data['name'],
                    'house_id' => $houses,
                    'created' => $this->input->server('REQUEST_TIME'),
                    'updated' => $this->input->server('REQUEST_TIME'),
                    'house_id' => $houses,
                );
                $item['site'] = empty($data['site']) ? '' : $data['site'];
                $item['identity'] = empty($data['identity']) ? '' : $data['identity'];
                $land = $this->MLandlord->add($item);
            } else{
                $land = $this->MLandlord->update($lord->id, array('updated' => $this->input->server('REQUEST_TIME'), 'house_id' => $lord->house_id . '~' . $houses));
            }
            if ($land) {
                $res['msgs'] = '亲,这条数据已经添加,继续加油哦!';
                $this->_return_json($res);
            }
        } else {
            foreach ($house as $value) {
                $user = $this->Muser->geto($value->user_id);
                if ($value) {
                    $res['msgs'] = '亲,这条数据已有,你可以去问问' . $user->name . ',继续加油哦!';
                    $this->_return_json($res);
                }
            }
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
		$this->load->view('family/address', $data);
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

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class House extends MY_Controller {
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
        $this->load->model(array('Muser', 'MHouse', 'MLocation'));
        if ($this->user->position < C('user.position.code.zishengzhiyeguwen')) {
            $page_size = 3;
            $item = array(
                'status' => C('house.house.code'),
            );
            $house = $this->MHouse->query(array($item), $tab, $page_size);
        } else {
            $house = $this->MHouse->query(array(array('status' => C('house.house.code'), 'user_id' => $this->user->uid)));
            $other_house = $this->MHouse->query(array(array('status' => C('house.house.code.weizu'), 'user_id <>' => $this->user->uid)));
        }
        $this->pagination->initialize(array(
            'per_page'    => $page_size,
            'base_url'    => site_url('house/index'),
            'uri_segment' => 3,
            'total_rows'  => $this->MHouse->count(array($item)),
            //'suffix' => $keyword ? sprintf('?keyword=%s', $keyword) : '    ',
        ));
        
        foreach ($house as $value) {
            $array = explode('.', $value->location);
            $town = $this->MLocation->geto($array[0])->name;
            $street = $this->MLocation->geto($array[1])->name;
            $community = $this->MLocation->geto($array[2])->name;
            $location = $town . $street . $community;
            $arr = explode('_', $value->house_type);
            $type = $arr[0] . '室' . $arr[1] . '厅' . $arr[2] . '卫,' . $value->area . '平米';
            $user = $this->Muser->get($value->user_id);

            $data['house'][] = array(
                'id' => $value->id,
                'user' => $user[0]['name'],
                'location' => $location,
                'type' => $type,
                'expect' => $value->h_expect . '元',
                'decoration' => C('house.decoration.text.' . $value->decoration),
                'storey' => $value->storey,
                'status' => C('house.house.text.' . $value->status),
                'orientation' => $value->orientation,
                'appliance' => C('house.appliance.text.' . $value->appliance),
            );
        }
        if (isset($other_house)) {
            foreach ($other_house as $value) {
                $array = explode('.', $value->location);
                $town = $this->MLocation->geto($array[0])->name;
                $street = $this->MLocation->geto($array[1])->name;
                $community = $this->MLocation->geto($array[2])->name;
                $location = $town . $street . $community;
                $arr = explode('_', $value->house_type);
                $type = $arr[0] . '室' . $arr[1] . '厅' . $arr[2] . '卫,' . $value->area . '平米';

                $user = $this->Muser->geto($value->user_id);
                $data['other_house'][] = array(
                    'id' => $value->id,
                    'user' => $user->name,
                    'location' => $location,
                    'type' => $type,
                    'expect' => $value->h_expect . '元',
                    'decoration' => C('house.decoration.text.' . $value->decoration),
                    'storey' => $value->storey,
                    'status' => C('house.house.text.' . $value->status),
                    'orientation' => $value->orientation,
                    'appliance' => C('house.appliance.text.' . $value->appliance),
                );
            }
        }

        $data['pager'] = $this->pagination->create_links(); 
		$this->load->view('House/index', $data);
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

        $rest = array();
        $rest = array(
            'location' => $data['town'] . '.' . $data['street'] . '.' . $data['community'],
            'address'=> $data['build'] . '-' . $data['element'] . '-' . $data['house'],
        );
        $house = $this->MHouse->query(array($rest));
        if ( ! $house) {
            $rest['user_id'] = $user->id;
            $rest['h_expect'] = $data['h_expect'];
            $rest['d_expect'] = $data['d_expect'];
            $rest['agency'] = $data['deposit'] . '+' . $data['cash'];
            $rest['decoration'] = $data['decoration'];
            $rest['appliance'] = $data['appliance'];
            $rest['birth'] = $data['birth'];
            $rest['area'] = $data['area'];
            $rest['house_type'] = $data['room'] . '_' . $data['hall'] . '_' . $data['toilet'];
            $rest['orientation'] = $data['orientation'];
            $rest['storey'] = $data['storey'];
            $rest['condition'] = $data['condition'];
            $rest['created'] = $this->input->server('REQUEST_TIME');
            $rest['updated'] = $this->input->server('REQUEST_TIME');
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

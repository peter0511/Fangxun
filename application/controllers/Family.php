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
        $this->load->model(array('Muser', 'MHouse', 'MLocation'));
        $page_size = 3;
        $order_by = array('status' => 'ASC', 'updated' => 'ASC');
        $item = array(
            'status' => C('house.house.sale_code'),
            'user_id' => $this->user->uid,
        );
        $house = $this->MHouse->query(array($item), $tab, $page_size, $order_by);
        $this->pagination->initialize(array(
            'per_page'    => $page_size,
            'base_url'    => site_url('family/index'),
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
            $type = $arr[0] . '室' . $arr[1] . '厅' . $arr[2] . '卫';
            $user = $this->Muser->get($value->user_id);
            $storey = explode('/', $value->storey);
            $storeys = $storey[0] . '层,共' . $storey[1] . '层';

            $data['house'][] = array(
                'id' => $value->id,
                'user' => $user[0]['name'],
                'location' => $location,
                'type' => $type,
                'area' => $value->j_area . '平米',
                'expect' => $value->d_expect . '万元',
                'decoration' => C('house.decoration.text.' . $value->decoration),
                'storey' => $storeys,
                'time' => date('Y-m-d', $value->updated),
                'status' => C('house.house.sale_text.' . $value->status),
                //'orientation' => $value->orientation,
                'appliance' => C('house.appliance.text.' . $value->appliance),
            );
        }
        $data['is_mine'] = C('user.is_mine.code.yes');
        $data['pager'] = $this->pagination->create_links(); 
		$this->load->view('family/index', $data);
        $this->load->view('Common/footer');
	}

    public function init($tab = 0) {
        $this->load->model(array('Muser', 'MHouse', 'MLocation'));
        $page_size = 3;
        $order_by = array('status' => 'ASC', 'updated' => 'ASC');
        if ($this->user->position < C('user.position.code.zishengzhiyeguwen')) {
            $item = array(
                'status' => C('house.house.sale_code'),
            );
            $data['is_mine'] = C('user.is_mine.code.yes');
        } else {
            $item = array(
                'status' => C('house.house.sale_code.weishou'),
            );
        }
        $this->pagination->initialize(array(
            'per_page'    => $page_size,
            'base_url'    => site_url('family/init'),
            'uri_segment' => 3,
            'total_rows'  => $this->MHouse->count(array($item)),
            //'suffix' => $keyword ? sprintf('?keyword=%s', $keyword) : '    ',
        ));
        $other_house = $this->MHouse->query(array($item), $tab, $page_size, $order_by);
        foreach ($other_house as $value) {
            $array = explode('.', $value->location);
            $town = $this->MLocation->geto($array[0])->name;
            $street = $this->MLocation->geto($array[1])->name;
            $community = $this->MLocation->geto($array[2])->name;
            $location = $town . $street . $community;
            $arr = explode('_', $value->house_type);
            $type = $arr[0] . '室' . $arr[1] . '厅' . $arr[2] . '卫';
            $user = $this->Muser->get($value->user_id);
            $storey = explode('/', $value->storey);
            $storeys = $storey[0] . '层,共' . $storey[1] . '层';

            $data['house'][] = array(
                'id' => $value->id,
                'user' => $user[0]['name'],
                'location' => $location,
                'type' => $type,
                'area' => $value->j_area . '平米',
                'expect' => $value->d_expect . '万元',
                'decoration' => C('house.decoration.text.' . $value->decoration),
                'storey' => $storeys,
                'time' => date('Y-m-d', $value->updated),
                'status' => C('house.house.sale_text.' . $value->status),
                'orientation' => $value->orientation,
                'appliance' => C('house.appliance.text.' . $value->appliance),
            );
        }
        $data['pager'] = $this->pagination->create_links(); 
		$this->load->view('family/index', $data);
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
            $rest['j_area'] = $data['j_area'];
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
            $item = array(
                'user_id' => $user->id,
                'mobile' => $data['mobile'],
                'landlord_name' => $data['name'],
                'house_id' => $houses,
                'created' => $this->input->server('REQUEST_TIME'),
                'updated' => $this->input->server('REQUEST_TIME'),
                'house_id' => $houses,
                'type' => C('landlord.type.code.chushou'),
            );
            $item['site'] = empty($data['site']) ? '' : $data['site'];
            $item['identity'] = empty($data['identity']) ? '' : $data['identity'];
            $land = $this->MLandlord->add($item);
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
}

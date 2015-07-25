<?php defined('BASEPATH') OR exit('No direct script access allowed');

class House extends MY_Controller {
    protected $permissions;
    protected $uid;

    public function __construct() {
        parent::__construct();
        $this->load->Model(array('Mlocation'));
        $this->load->library(array('Auth', 'Pagination'));
        $this->permissions = $this->user->position;
        $this->uid = $this->user->uid;
    }

	public function index($tab = 0) {
        $this->load->model(array('Muser', 'MHouse', 'MLocation'));
        $page_size = 3;
        $order_by = array('status' => 'ASC', 'updated' => 'ASC');
        $item = array(
            'status' => C('house.house.code'),
            'user_id' => $this->user->uid,
        );
        $house = $this->MHouse->query(array($item), $tab, $page_size, $order_by);
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
                'time' => date('Y-m-d', $value->updated),
                'status' => C('house.house.text.' . $value->status),
                'orientation' => $value->orientation,
                'appliance' => C('house.appliance.text.' . $value->appliance),
            );
        }
        $data['is_mine'] = C('user.is_mine.code.yes');
        $data['pager'] = $this->pagination->create_links(); 
		$this->load->view('House/index', $data);
        $this->load->view('Common/footer');
	}

    public function init($tab = 0) {
        $this->load->model(array('Muser', 'MHouse', 'MLocation'));
        $page_size = 3;
        $order_by = array('status' => 'ASC', 'updated' => 'ASC');
        if ($this->user->position < C('user.position.code.zishengzhiyeguwen')) {
            $item = array(
                'status' => C('house.house.code'),
            );
            $data['is_mine'] = C('user.is_mine.code.yes');
        } else {
            $item = array(
                'status' => C('house.house.code.weizu'),
            );
        }
        $this->pagination->initialize(array(
            'per_page'    => $page_size,
            'base_url'    => site_url('house/init'),
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
            $type = $arr[0] . '室' . $arr[1] . '厅' . $arr[2] . '卫,' . $value->area . '平米';

            $user = $this->Muser->geto($value->user_id);
            $data['house'][] = array(
                'id' => $value->id,
                'user' => $user->name,
                'location' => $location,
                'type' => $type,
                'expect' => $value->h_expect . '元',
                'decoration' => C('house.decoration.text.' . $value->decoration),
                'storey' => $value->storey,
                'time' => date('Y-m-d', $value->updated),
                'status' => C('house.house.text.' . $value->status),
                'orientation' => $value->orientation,
                'appliance' => C('house.appliance.text.' . $value->appliance),
            );
        }
        $data['pager'] = $this->pagination->create_links(); 
		$this->load->view('House/index', $data);
        $this->load->view('Common/footer');
    }

	public function add($house_id = False) {
        $this->load->model(array('MHouse', 'MLocation', 'MLandlord'));
        if ($house_id) {
            $houses = $this->MHouse->query(array(array('id' => $house_id, 'status' => C('house.house.code'))));
            if (empty($houses)) {
                redirect('house');
            }
            foreach ($houses as $house) {
                $array = explode('.', $house->location);
                $town = $this->MLocation->geto($array[0]);
                $street = $this->MLocation->geto($array[1]);
                $community = $this->MLocation->geto($array[2]);
                $address = explode('-', $house->address);
                $arra = explode('+', $house->agency);
                $arr = explode('_', $house->house_type);
            
                $landlord = $this->MLandlord->get_byo('house_id', $house_id);
                $data = array(
                    'id'          => $house->id,
                    'name'    => $landlord->landlord_name,
                    'mobile'      => $landlord->mobile,
                    'identity'    => $landlord->identity,
                    'tow'        => $town,
                    'stree'      => $street,
                    'communit'   => $community,
                    'build'       => $address[0],
                    'element'     => $address[1],
                    'hous'       => $address[2],
                    'birth'       => $house->birth,
                    'orientation' => $house->orientation,
                    'storey'      => $house->storey,
                    'room'        => $arr[0],
                    'hall'        => $arr[1],
                    'toilet'      => $arr[2],
                    'area'        => $house->area,
                    'h_expect'    => $house->h_expect,
                    'd_expect'    => $house->d_expect,
                    'deposit'     => $arra[0],
                    'cash'        => $arra[1],
                    'decoratio'   => C('house.decoration.text.' . $house->decoration),
                    'applianc'    => C('house.appliance.text.' . $house->appliance),
                    'condition'   => $house->condition,
                    'status'      => $house->status,
                    'statuss'     => C('house.house.text.' . $house->status),
                );
            }
        }
            $this->load->model('Mlocation');
            $house = C('house.house.text');
            $appliance = C('house.appliance.text');
            $decoration = C('house.decoration.text');
            //$data = array();
            $location = $this->Mlocation->query(array(array('upid' => 0)));
            //$data = array(
            //    'house' => $house,
            //    'appliance' => $appliance,
            //    'decoration' => $decoration,
            //);
            $data['house'] = $house;
            $data['appliance'] = $appliance;
            $data['decoration'] = $decoration;
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
        echo '<pre>'; var_dump($data); echo '</pre>'; die();
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
            $item = array(
                'user_id' => $user->id,
                'mobile' => $data['mobile'],
                'landlord_name' => $data['name'],
                'house_id' => $houses,
                'created' => $this->input->server('REQUEST_TIME'),
                'updated' => $this->input->server('REQUEST_TIME'),
                'house_id' => $houses,
                'type' => C('landlord.type.code.chuzu'),
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

    public function view($house_id){
        $this->load->model(array('MHouse', 'MLandlord', 'MLocation'));
        //$house = $this->MHouse->geto($house_id);
        $houses = $this->MHouse->query(array(array('id' => $house_id, 'status' => C('house.house.code'))));
        if (empty($houses)) {
            redirect('house');
        }
        //if ($this->uid == $house->user_id && $this->user->position < C('user.position.code.zishengzhiyeguwen')) {
        foreach ($houses as $house) {
            $array = explode('.', $house->location);
            $town = $this->MLocation->geto($array[0])->name;
            $street = $this->MLocation->geto($array[1])->name;
            $community = $this->MLocation->geto($array[2])->name;
            $address = explode('-', $house->address);
            $arra = explode('+', $house->agency);
            $arr = explode('_', $house->house_type);
            $storey = explode('/', $house->storey);
        
            $landlord = $this->MLandlord->get_byo('house_id', $house_id);
            $data = array(
                'id'          => $house->id,
                'landlord'    => $landlord->landlord_name,
                'mobile'      => $landlord->mobile,
                'identity'    => $landlord->identity,
                'site'        => $landlord->site,
                'location'    => $town . $street . $community,
                'address'     => $address[0] . ' 号楼, ' . $address[1] . ' 单元, ' . $address[2] . ' 室 ',
                'birth'       => $house->birth,
                'orientation' => $house->orientation,
                'storey'      => $storey[0] . '层, 共有' . $storey[1] . '层',
                'house_type'  => $arr[0] . ' 室 ' . $arr[1] . ' 厅 ' . $arr[2] . ' 卫 ,' . $house->area . ' 平米',
                'h_expect'    => $house->h_expect,
                'd_expect'    => $house->d_expect,
                'deposit'     => $arra[0],
                'cash'        => $arra[1],
                'decoration'  => C('house.decoration.text.' . $house->decoration),
                'appliance'   => C('house.appliance.text.' . $house->appliance),
                'condition'   => $house->condition,
                'status'      => C('house.house.text.' . $house->status),
                'statuss'     => $house->status,

            );
        }
        $this->load->view('House/view', $data);
        $this->load->view('Common/footer');
        //} 
    }

    public function ajax_save_edit(){
        $this->load->model(array('MHouse'));
        $id = $this->input->post('id', TRUE);
        $status = $this->input->post('stat', TRUE);
        $contract = $this->input->post('contract', TRUE);
        $house = $this->MHouse->geto($id);
        $update = $this->input->server('REQUEST_TIME');
        if ($house->status !== C('house.house.code.weizu')) {
            $success = $this->MHouse->update($id, array('status' => $status, 'contract' => $contract, 'updated' => $update));
            if ($success) {
                $res['msgs'] = '嗯,亲,不错啊!继续加油哦';
                $this->_return_json($res);
            }else{
                $res['msg'] = '等等,再看看什么情况';
                $this->_return_json($res);
            }
        }
    }
}

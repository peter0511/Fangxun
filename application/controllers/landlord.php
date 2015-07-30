<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Landlord extends MY_Controller {
    protected $user;
    protected $permissions;

    function __construct() {
        parent::__construct();
        $this->load->library(array('Auth', 'Pagination'));
        $this->user = $this->auth->logined();
        if (!isset($this->user->uid)) {
            redirect('login');
        }
        $this->permissions = $this->user->position;
    }

	public function index($tab = 0) { 
        $this->load->model(array('Muser', 'MLandlord', 'MHouse', 'MLocation'));
        $page_size = 3;
        if ($this->user->position < C('user.position.code.zishengzhiyeguwen')) {
            $item = array(
                'status' => C('landlord.status.code'),
            );
        } else {
            $item = array(
                'user_id' => $this->user->uid, 
                'status' => C('Landlord.status.code'),
            );
        }
        $landlord = $this->MLandlord->query(array($item), $tab, $page_size, array('status' => 'ASC','created' => 'DESC'));
        $this->pagination->initialize(array(
            'per_page'    => $page_size,
            'base_url'    => site_url('landlord/index'),
            'uri_segment' => 3,
            'total_rows'  => $this->MLandlord->count(array($item)),
            //'suffix' => $keyword ? sprintf('?keyword=%s', $keyword) : '    ',
        ));
        $data = array();
        foreach ($landlord as $value) {
            $house = $this->MHouse->geto($value->house_id);
            $array = explode('.', $house->location);
            $town = $this->MLocation->geto($array[0])->name;
            $street = $this->MLocation->geto($array[1])->name;
            $community = $this->MLocation->geto($array[2])->name;
            $house = '编号:' . $value->house_id . ' ; 地址:' . $town . $street . $community;
            $data['landlord'][] = array(
                'id' => $value->id,
                'name' => $value->landlord_name,
                'identity' => $value->identity,
                'mobile' => $value->mobile,
                'site' => $value->site,
                'user' => $this->Muser->geto($value->user_id)->name,
                'house' => $house,
                'type' => C('landlord.type.text.' . $value->type),
            );
        }
        $data['pager'] = $this->pagination->create_links(); 
		$this->load->view('Landlord', $data);
        $this->load->view('Common/footer');
    }
}

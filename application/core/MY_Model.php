<?php
/**
 * Class MY_model 
 * @author Dennis( yuantaotao@gmail.com )
 */
class MY_Model extends CI_Model
{
    private $table = NULL;
    public function __construct($table = NULL)
    {
        $this->table = $table;
        parent::__construct();
    }

    public function end1($start = 0, $size = 0, $order_by = array())
    {
        if($size > 0) {
            $this->db->limit($size, $start);
        }
        foreach($order_by as $field => $order) {
            $this->db->order_by($field, $order);
        }
        return $this->db->get($this->table)->result();
    } 

    /**
     * switch_db
     * @return void
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function switch_db($db = 'default')
    {
        if ($db === 'default') {
            unset($this->db);
        } else {
            $this->db = $this->load->database($db, TRUE);
        }
    }

    /**
     * get
     * @return array
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function get($id)
    {
        return $this->get_by('id', $id);
    }

    /**
     * get_by
     * @return array 
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function get_by($name, $value)
    {
        if(!empty($value) && is_array($value)){
            $this->db->where_in($name, $value);
        }else{
            $this->db->where($name, $value);
        }
        return $this->db->get($this->table)->result_array();
    }

    /**
     * get
     * @return object
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function geto($id, $status_strict = TRUE) {
        return $this->get_byo('id', $id, $status_strict);
    }
    
    /**
     * get_by
     * @return object 
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function get_byo($key, $value, $status_strict = TRUE) {
        $this->db->where($key, $value);
        //if ($status_strict) {
        //    $this->db->where('status', 0);
        //}
        $res = $this->db->get($this->table, 1)->first_row();
        return $res;
    }
    
    public function query($query = array(), $start = 0, $size = 0, $order_by = array()) {
//        $status = FALSE;
        foreach($query as $condition) {
            foreach($condition as $key => $value) {
                $keys = explode(' ', $key);
//                if($keys[0] == 'status') {
//                    $status = TRUE;
//                }
                if(is_array($value)){
                    $this->db->where_in($key, $value);
                }else{
                    $this->db->where($key, $value);
                }
            }
        }
//        if(!$status) {
//            $this->db->where('status', 0);
//        }

        if($size > 0) {
            $this->db->limit($size, $start);
        }

        foreach($order_by as $field => $order) {
            $this->db->order_by($field, $order);
        }

        $res = $this->db->get($this->table)->result();
        return $res;
    }

    /**
     * gets_by
     * @return array
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function gets_by($name_arr, $value_arr, $order = array())
    {
        foreach ($name_arr as $key => $name) {
            if(is_array($value_arr[$key]) && !empty($value_arr[$key])) {
                $this->db->where_in($name, $value_arr[$key]);
            } else {
                $this->db->where($name, $value_arr[$key]);
            }
        }
        foreach($order as $key => $value) {
            $this->db->order_by($key, $value);
        }
        return $this->db->get($this->table)->result_array();
    }

    /**
     * count_by
     * @return int
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function count_by($name_arr, $value_arr)
    {
        foreach ($name_arr as $key => $name) {
            if(is_array($value_arr[$key])){
                $this->db->where_in($name, $value_arr[$key]);
            }else{
                $this->db->where($name, $value_arr[$key]);
            } 
        }
        return $this->db->count_all_results($this->table);
    }

    /**
     *      * count
     *           * @return int
     *                * @author zp( huster.zhangpeng@gmail.com )
     *                     **/
    public function count($query = array()) {
//        $status = FALSE;
        foreach($query as $condition) {
            foreach($condition as $key => $value) {
                $keys = explode(' ', $key);
//                if($keys[0] == 'status') {
//                    $status = TRUE;
//                }
                if(is_array($value)){
                    $this->db->where_in($key, $value);
                }else{
                    $this->db->where($key, $value);
                }
            }
        }
//        if(!$status) {
//            $this->db->where('status', 0);
//        }
        $res = $this->db->count_all_results($this->table);
        return $res;
    }

    /**
     * lists_by
     * @return void
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function lists_by($name, $order='DESC', $limit=10)
    {
        return $this->db->order_by($name, $order)->limit($limit)->get($this->table)->result_array();
    }

    /**
     * add
     * @return boolean
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    /**
     * update
     * @return void
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function update($id, $data)
    {
        return call_user_func_array(array($this, 'update_by'), array('id', $id, $data));
    }

    /**
     * update_by
     * @return void
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function update_by($name, $value, $data)
    {
        return $this->db->update($this->table, $data, array($name => $value));
    }

    /**
     * update_by
     * @return void
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function update_bys($where_arr, $data)
    {
        foreach($where_arr as $key => $value) {
            if(is_array($value) && !empty($value)) {
                $this->db->where_in($key, $value);
            } else {
                $this->db->where($key, $value);
            }
        }
        return $this->db->update($this->table, $data);
    }

    /**
     * add_ignore
     * @return boolean
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function add_ignore($data)
    {
        $insert_query = $this->db->insert_string($this->table, $data);
        $insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
        return $this->db->query($insert_query);
    }

    /**
     * delete
     * @return int
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function delete($id)
    {
        return call_user_func_array(array($this, 'delete_by'), array('id', $id));
    }

    /**
     * delete_by
     * @return int
     * @author Dennis( yuantaotao@gmail.com )
     **/
    public function delete_by($name, $value)
    {
        return $this->db->delete($this->table, array($name => $value));
    }

    public function count_for_admin($query_type = '', $query_word = '') {
        if(($query_type !== '') && ($query_word !== '')) {
            $this->db->where($query_type, $query_word);
        }
        return $this->db->count_all_results($this->table);
    }

    public function list_for_admin($start = 0, $size = 20, $query_type = '', $query_word = '') {
        if(($query_type !== '') && ($query_word !== '')) {
            $this->db->where($query_type, $query_word);
        }
        $this->db->order_by('id', 'DESC');
        return $this->db->get($this->table, $size, $start)->result();
    }

}


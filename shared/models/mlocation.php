<?php
class Mlocation extends MY_Model {

    private $table = "location";

    public function __construct(){
        parent::__construct($this->table);
    }
}

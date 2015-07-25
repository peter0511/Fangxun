<?php
class MHouse extends MY_Model {
    private $table = "houses";

    public function __construct(){
        parent::__construct($this->table);
    }
}

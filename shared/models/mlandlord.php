<?php
class MLandlord extends MY_Model {
    private $table = "landlord";

    public function __construct(){
        parent::__construct($this->table);
    }
}

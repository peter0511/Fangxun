<?php
class MHome extends MY_Model {
    private $table = "homes";

    public function __construct(){
        parent::__construct($this->table);
    }
}

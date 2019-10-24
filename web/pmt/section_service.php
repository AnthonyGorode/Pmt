<?php

require_once "initialize.php";

class Section_service extends Initialize {

    public $result;
    private $oBdd;


    public function __construct(){
        parent::__construct();
        $this->oBdd = parent::__construct();
        $this->result = [];
    }
    public function __destruct(){
        parent::__destruct();
    }
}
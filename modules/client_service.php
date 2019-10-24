<?php

require_once "initialize.php";


class Client_service extends Initialize
{
    public $result;
    private $oBdd;

    public function __construct(){
        $this->oBdd = parent::__construct();
        $this->result = [];
    }

    public function __destruct()	{
        parent::__destruct();
    }
}
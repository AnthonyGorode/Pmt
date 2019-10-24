<?php

require_once "pmt_selected_service.php";

class Pmt_selected extends Pmt_selected_service {

    public function __construct(){
        parent::__construct();
        $this->main();
    }
    public function __destruct(){
        parent::__destruct();
    }

    public function main() {

    }
}
<?php

require_once "formation_service.php";

class Formation extends Formation_service {

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
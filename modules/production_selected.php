<?php

require_once "production_selected_service.php";

class Production_selected extends Production_selected_service {

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
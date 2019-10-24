<?php

require_once "vignette_service.php";

class Vignette extends Vignette_service {

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
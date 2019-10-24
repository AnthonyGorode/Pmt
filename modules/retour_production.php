<?php

require_once "retour_production_service.php";

class Retour_production extends Retour_production_service {

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
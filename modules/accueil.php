<?php

require_once "accueil_service.php";

class Accueil extends Accueil_service {

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
<?php

require_once "gestion_service.php";

class Gestion extends Gestion_service {

    public function __construct(){
        parent::__construct();
        $this->main();
    }
    public function __destruct(){
        parent::__destruct();
    }

    public function main() {
        $this->getAllFormateur();
        if (isset($this->VARS_HTML['submit_mail'])) {
            if ($_SESSION['current_time'] != $this->VARS_HTML['current_time'] && !empty($mailTo)) {
                $this->insertDefaultFormateur();
                $lastFormateurId = $this->result['last_insert_id'];
                $this->getLastFormateur($lastFormateurId);
                $dayCreationFormateur = $this->result['last_formateur'][0]["day"];
                $this->updatePwdFormateur($lastFormateurId,$password);
                $_SESSION['current_time'] = $this->VARS_HTML['current_time'];
            } else {
                header('Location:gestion');
            }
        }
    }
}
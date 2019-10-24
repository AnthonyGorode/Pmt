<?php

require_once ("gestion_service.php");

class gestion_ajax extends Gestion_service
{
    public function __construct(){
        parent::__construct();
        $this->main();
    }
    public function __destruct(){
        parent::__destruct();
    }

    public function main() {
        $mode = $this->VARS_HTML['mode'];
        $this->result['nb_form_error'] = 0;
        //Vérifier si l'email existe
        $emailExist = $this->checkIfEmailExist();
        if($emailExist) {
            $this->result['nb_form_error'] = 1;
        } else {
            $this->getAllFormateur();
                $this->result['nb_form_error'] = 0;
            $this->result['formateur_data'] = $this->result['all_formateur'];
        }
    }
    private function checkIfEmailExist(){
        $isEmailNotExist = false;
        $this->checkEmailExist();
        if(!isset($this->result['email_exist'][0]['email_user'])){
            return $isEmailNotExist;
        } else {
            $isEmailNotExist = true;
            return $isEmailNotExist;
        }
    }
}
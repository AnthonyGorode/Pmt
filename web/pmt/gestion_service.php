<?php

require_once "initialize.php";

class Gestion_service extends Initialize {

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

    protected function updatePwdFormateur($lastUserId, $uniqueCode) {
        $spathSQL= $this->GLOBALS_INI['PATH_HOME'] . $this->GLOBALS_INI['PATH_SQL'] . 'update_last_formateur.sql';
        $this->result['default_user'] = $this->oBdd->treatDatas($spathSQL, array(
            'pwd_formateur' => $uniqueCode,
            'id_formateur' => $lastUserId,
        ));
    }

    protected function getAllFormateur(){
        $spathSQL= $this->GLOBALS_INI['PATH_HOME'] . $this->GLOBALS_INI['PATH_SQL'] . 'get_all_formateur.sql';
        $this->result['all_admin']= $this->oBdd->getSelectDatas($spathSQL, array());
    }

    protected function checkEmailExist() {
        $spathSQL= $this->GLOBALS_INI['PATH_HOME'] . $this->GLOBALS_INI['PATH_SQL'] . 'search_email.sql';
        $this->result['email_exist']= $this->oBdd->getSelectDatas($spathSQL, array(
            'email_user' => $this->VARS_HTML['email_user']
        ));
    }
}
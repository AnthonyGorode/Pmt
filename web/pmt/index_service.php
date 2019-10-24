<?php

require_once 'initialize.php';
require_once 'utils.php';

class Index_service extends Initialize
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

//todo : crypter les mots de passe en BDD
    public function getSingleFormateur() {
        error_log('REQUEST ONE FORMATEUR');
        $spathSQL= $this->GLOBALS_INI['PATH_HOME'] . $this->GLOBALS_INI['PATH_SQL'] . 'get_single_formateur.sql';
        $cryptedPassword = Utils::crypterSSL($this->VARS_HTML['email_formateur'], $this->VARS_HTML['pwd_formateur']);
        $this->result['select_formateur']= $this->oBdd->getSelectDatas($spathSQL, array(
            'email_formateur' => $this->VARS_HTML['email_formateur'],
            'pwd_formateur' => $cryptedPassword
        ));
    }

    public function selectFormateurForgotPassord(){
        $spathSQL= $this->GLOBALS_INI['PATH_HOME'] . $this->GLOBALS_INI['PATH_SQL'] . 'get_formateur_forgot_pass.sql';
        $this->result['select_formateur_forgot_pass']= $this->oBdd->getSelectDatas($spathSQL, array(
            'email_formateur' => $this->VARS_HTML['email_formateur_forgot']
        ));
    }
}
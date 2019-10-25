<?php

require_once 'index_service.php';
require_once 'utils.php';

class Index extends Index_service {
    public function __construct(){
        parent::__construct();
        $this->main();
    }
    public function __destruct(){
        parent::__destruct();
    }

    public function main() {

        $this->result['message_error'] = '';
        
        if(isset($_SESSION['id_formateur']) && $_SESSION['id_formateur'] != ""){
            session_destroy();
            header('Location:index');
        }
        elseif(isset($this->VARS_HTML['submitpost'])){
            $CaptchaValid = Utils::reCaptcha($this->VARS_HTML);
            if(true){
                $this->result['message_error'] = "";

                if(isset($this->VARS_HTML['email_formateur']) && isset($this->VARS_HTML['pwd_formateur'])) {
                    $cryptedPassFromFormateur = Utils::crypterssl($this->VARS_HTML['email_formateur'],$this->VARS_HTML['pwd_formateur']);
                    $this->getSingleFormateur();
                    var_dump($this->result['select_formateur']);
                    if(count($this->result['select_formateur']) > 0) {
                        $selectedFormateur = $this->result['select_formateur'][0];
                        
                        if(isset($selectedFormateur['mot_de_passe_formateur']) && isset($selectedFormateur['email_formateur'])){
                            $cryptedPassFromBdd = $selectedFormateur['mot_de_passe_formateur'];
                            error_log('cryptedPassFromBdd :'.$cryptedPassFromBdd);

                            $isPasswordExist = $cryptedPassFromFormateur == $cryptedPassFromBdd;
                            $isEmailExist = $cryptedPassFromFormateur == $cryptedPassFromBdd;

                            if($isPasswordExist && $isEmailExist){
                                session_start();
                                error_log('THE SESSION HAS BEEN STARTED');

                                $_SESSION['id_formateur']=$selectedFormateur['id_formateur'];
                                $_SESSION['nom_formateur']=$selectedFormateur['nom_formateur'];
                                $_SESSION['prenom_formateur']=$selectedFormateur['prenom_formateur'];
                                $_SESSION['email_formateur']=$selectedFormateur['email_formateur'];
                                $_SESSION['current_time']= time();

                                header('Location:accueil');
                            }
                        }
                    }
                    $this->result['message_error'] = "Vos identifiants sont invalides";
                }
            } else {
                $this->result['message_error'] = "reCaptcha invalide";
            }
        }
    }
}
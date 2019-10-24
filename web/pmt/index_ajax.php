<?php

require_once "index_service.php";
require_once "utils.php";

class Admin_ajax extends Index_service {

    public function __construct()	{
        parent::__construct();
        $this->main();
    }

    public function __destruct()	{
        parent::__destruct();
    }

    public function main()	{
        $mode = $this->VARS_HTML['mode'];

        if(isset($mode) && $mode == 'initialize_mail'){
            $this->selectFormateurForgotPassord();

            if($this->result['select_formateur_forgot_pass'] != NULL){
                $nbState = 0;
                $formateurSelected = $this->result['select_formateur_forgot_pass'][0];
                $emailFormateurrFromDb = $formateurSelected['email_formateur'];
                $idFormateurFromDb = $formateurSelected['id_formateur'];

                $this->result['nb_form_error'] = $nbState;
                $this->result['error_message'] = '*Ce formateur est valide';
                $cryptFormateurId = Utils::crypter('rps042019.', $idFormateurFromDb);
                $this->mailForgot($emailFormateurFromDb, $cryptFormateurId);
            }
            else{
                $nbState = 1;
                $this->result['nb_form_error'] = $nbState;
                $this->result['error_message'] = '*Ce formateur est inactif ou n\'existe pas!';
            }
        }
    }


    private function mailForgot($emailFormateur, $cryptFormateurId){
        $mail = $emailFormateur;
        $subject = 'Ré-initialisation de votre mot de passe';
        $message ='<html>
						<head>
							<title>Ré-initialisation de votre mot de passe</title>
						</head>
						<body>
						<p>Vous avez oublié votre mot de passe?</p>
						<p>Suivez le lien ci-dessous pour le réinitialiser : </p>
						<a href="http://localhost/rps/route.php?page=forgot&crypted_key='.$cryptAdminId.'">Cliquer ici pour modifier votre mot de passe!</a>
						</body>
					</html>';
        $isSent= mail($mail, $subject, $message);
        if($isSent){
            error_log('email envoyé');
        }
    }
}
?>
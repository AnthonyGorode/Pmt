<?php
/**
 * updated 24/08/2019
 */
require_once "index_service.php";
require_once "utils.php";
/**
 * Class Forgot | file forgot.php
 *
 * In this class, we find all about Forgot page 
 *
 * List of classes needed for this class
 * admin_service.php
 * utils.php
 *
 *
 * @package Rps Project
 * @subpackage rps
 * @author @Afpa Lab Team 5
 * @copyright  1920-2080 The Afpa Lab Team 5 Group Corporation World Company
 * @version v1.0
 */
class Forgot extends Index_service	{

	public function __construct()	{
	/**
	 * Call the parent constructor
	 *
	 * execute main function
	 * 
	 */
		parent::__construct();

		// execute main function
		$this->main();
	}

	/**
	 * Call the parent destructor
	 */
	public function __destruct()	{
		parent::__destruct();
	}

	/**
	 * Execute when constructor is called
	 * decrypt id from url parameter (crypted_key token)
	 * if password valid update user password else set error message to display to the view
	 * 
	 * TODO // decrypt idUser (find why Utils::decrypter not working)
	 * TODO // forgot.js check passwords fields
	 */
	public function main()	{
        $this->result['code_error'] = '';
		//if (isset($this->VARS_HTML['crypted_key']) && !empty($this->VARS_HTML['crypted_key']))    {
			//$this->result['crypted_key'] = $this->VARS_HTML['crypted_key'];
			//error_log("crypted_key: ". $this->VARS_HTML['crypted_key']);
			// $keyToDecrypt = $this->VARS_HTML['crypted_key']; 
			// $IdUser = Utils::decrypter('rps042019.',$keyToDecrypt);
			//$idUser = $this->VARS_HTML['crypted_key'];
			//error_log('id_user: '.$idUser);
		//}
		//else  {
        if ((isset($this->VARS_HTML['password_forgot'])) && (isset($this->VARS_HTML['password_confirm_forgot']))) {
            $passwordForgot = $this->VARS_HTML['password_forgot'];
            error_log($passwordForgot);
            $passwordConfirmForgot = $this->VARS_HTML['password_confirm_forgot'];
            error_log($passwordConfirmForgot);
            $passWordState = $this->controlPassword($passwordForgot, $passwordConfirmForgot);
            
            if ($passWordState == 0)    {
				$this->updateAdminPassword($passwordForgot, $passwordConfirmForgot);
            }
            else    {
				$this->setMessageAndCodeError($passWordState);
            }
        }
    }
	/**
	* Control if the password exist and if the given password is valid
	*
	* @param string $passwordToCompare
	* @param string $confirmToCompare
	* @return void
	*/
	private function controlPassword($passwordToCompare, $confirmToCompare)    {
		error_log('controlPassword function started');
		$nbState = '';
        $isPasswordEmpty = true;
        $isConfirmEmpty = true;
        $isEqual = false;
        $isPasswordValid = false;
        if (isset($passwordToCompare) && !empty($passwordToCompare))    {
            $isPasswordEmpty = false;
            error_log('1 not empty');
        }
        else    {
            $nbState = '1';
            error_log('1 empty');
        }
        if (isset($confirmToCompare) && !empty($confirmToCompare))    {
            $isConfirmEmpty = false;
            error_log('2 not empty');
        }
        else    {
            $nbState = '2';
            error_log('2 empty');
        }
        
        if ((($isPasswordEmpty == false) && ($isConfirmEmpty == false)) && ($passwordToCompare == $confirmToCompare))   {
			$isEqual = true;
            error_log('equal');
        }
        else    {
            $nbState = '3';
            error_log('not equal');
        }
        
        if ($isEqual == true)    {
            $pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!\.*$@%_])([-+!\.*$@%_\w]{8,15})$/';
            if (preg_match($pattern, $passwordToCompare))   {
                
                error_log('regex ok');
            }
        }
        else    {
            $nbState = '4';
        }
            
        if ($isPasswordValid == true)    {
            $nbState = '0';
        }
		return $nbState;
    }
	/**
	* Called by main function
	* set message in result['code_error'] for the view
	*
	* @param integer $nbState
	* @return void
	*/
	private function setMessageAndCodeError($nbState){
        if($nbState == 0)     {
            $this->result['message_error'] = 'OK';
			$this->result['code_error'] = 0;
		}
		if($nbState == 1)     {
            $this->result['message_error'] = 'Le champ Nouveau mot de passe est vide';
			$this->result['code_error'] = 1;
		}
		else if($nbState == 2)    {
			$this->result['message_error'] = 'Le champ Confirmer le mot de passe est vide';
			$this->result['code_error'] = 2;
		}
		else if($nbState == 3)    {
			$this->result['message_error'] = 'Les passwords sont différents';
			$this->result['code_error'] = 3;
		}		
        else if($nbState == 4)    {
			$this->result['message_error'] = 'Veuillez rentrer un mot de passe de 15 caractères, dont une majuscule, une minuscule, un chiffre et un caractère spécial';
			$this->result['code_error'] = 4;
		}
	}
//End of class
}

?>
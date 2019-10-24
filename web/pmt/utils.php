<?php
/**
 * updated 24/08/2019
 */
require_once "autoload.php";
/**
 * Class Utils | file utils.php
 *
 * In this class, we find all static functions
 * All functions here can be used in any layers
 *
 * List of classes needed for this class
 * autoload.php (reCaptcha)
 *
 * @package Rps Project
 * @subpackage rps
 * @author @Afpa Lab Team 5
 * @copyright  1920-2080 The Afpa Lab Team 5 Group Corporation World Company
 * @version v1.0
 */
class Utils {
    /**
     * Crypt SSL function can not be decrypted
     *
     * @param string $myCryptKey
     * @param string $myStringToCrypt
     * @return string
     */
    public static function crypterssl($myCryptKey, $myStringToCrypt) {
        // Set a random salt
        // $salt = openssl_random_pseudo_bytes(8);
        // Or empty salt so that we'll be able to compare again
        $salt= "";
        $salted = '';
        $dx = '';
        // Salt the key(32) and iv(16) = 48
        while (strlen($salted) < 48) {
            $dx = md5($dx.$myCryptKey.$salt, true);
            $salted .= $dx;
        }
        $key = substr($salted, 0, 32);
        $iv  = substr($salted, 32,16);
        $encrypted_data = openssl_encrypt($myStringToCrypt, 'aes-256-cbc', $key, true, $iv);
        return base64_encode('Salted__' . $salt . $encrypted_data);
    }


    /**
     * Crypt md5 function can be decrypted using decrypt function
     *
     * @param string $myCryptKey
     * @param string $myStringToCrypt
     * @return string
     */
    public static function crypter($myCryptKey, $myStringToCrypt){
        $myCryptKey = md5($myCryptKey);
        $letter = -1;
        $newstr = "";
        $strlen = strlen($myStringToCrypt);
        for($i = 0; $i < $strlen; $i++ ){
            $letter++;
            if ( $letter > 31 ){
                $letter = 0;
            }
            $neword = ord($myStringToCrypt{$i}) + ord($myCryptKey{$letter});
            if ( $neword > 255 ){
                $neword -= 256;
            }
            $newstr .= chr($neword);
        }
        return base64_encode($newstr);
    }


    /**
     * Decrypt md5 function
     *
     * @param string $myCryptKey
     * @param string $myStringToCrypt
     * @return string $newstr
     */
    public static function decrypter($myCryptKey, $myStringToCrypt){
        $myCryptKey = md5($myCryptKey);
        $letter = -1;
        $newstr ="";
        $myStringToCrypt = base64_decode($myStringToCrypt);
        $strlen = strlen($myStringToCrypt);
        for ( $i = 0; $i < $strlen; $i++ ){
            $letter++;
            if ( $letter > 31 ){
                $letter = 0;
            }
            $neword = ord($myStringToCrypt{$i}) - ord($myCryptKey{$letter});
            if ( $neword < 1 ){
                $neword += 256;
            }
            $newstr .= chr($neword);
        }
        return $newstr;
    }

    /**
     * Display the content of an object in error_log
     *
     * @param object $object
     * @return void
     */
    public static function var_error_log( $object=null ){
        ob_start();                    // start buffer capture
        print_r( $object );           // dump the values
        $contents = ob_get_contents(); // put the buffer into a variable
        ob_end_clean();                // end capture
        error_log("");
        error_log("");
        error_log("");
        error_log( $contents );        // log contents of the result of var_dump( $object )
        error_log("");
        error_log("");
        error_log("");
    }



    /**
     * Verify reCaptcha response
     * Here you can change the secret Key (do not forgot the site key in the view)
     *
     * @param array $VARS_HTML
     * @return boolean $recaptchaResult
     */
    public static function reCaptcha($VARS_HTML){
        $recaptchaResult = false;
        if(isset($VARS_HTML['g-recaptcha-response']) && !empty($VARS_HTML['g-recaptcha-response'])){
            $recaptcha = new \ReCaptcha\ReCaptcha("6LdgfKcUAAAAABPTjGTY9eBQj9OIFJdlQ_n_JQiA");
            $resp = $recaptcha->verify($VARS_HTML['g-recaptcha-response']);
            if ($resp->isSuccess()) {
                error_log('CAPTCHA valide');
                $recaptchaResult = true;
            }
            else {
                $errors = $resp->getErrorCodes();
                error_log('CAPTCHA invalide');
                utils::var_error_log($errors);
                $recaptchaResult = false;
            }
        }
        else{
            error_log('CAPTCHA non reseigné');
            $recaptchaResult =false;
        }
        return $recaptchaResult;
    }

//End of class
}

?>
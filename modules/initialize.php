<?php
/**
 * updated 24/08/2019
 */
require_once "database.php";
require_once "security.php";

/**
 * Class Initialize | file initialize.php
 *
 * In this class, we find all about initialize
 *
 * List of classes needed for this class
 * database.php
 * security.php
 *
 * @package Rps Project
 * @subpackage rps
 * @author @Afpa Lab Team 5
 * @copyright  1920-2080 The Afpa Lab Team 5 Group Corporation World Company
 * @version v1.0
 */
Class Initialize	{
	/**
	 * @var object $oBddInit
	 * @var array $GLOBAL_INI
	 * @var object $oSecu
	 * @var array $VARS_HTML
	 * 
	 */
	// Database instance object
	private $oBddInit;
	// All globals from INI
	protected $GLOBALS_INI;
	// Form Security instance object
	private $oSecu;
	// Array of data
	public $VARS_HTML;
	

	/**
	 * 
	 * Fill GLOBAL_INI with an array of path variables
	 * Create instance of Security and Database connection 
	 * Set data in public VARS_HTML from Security Object VARS_HTML argument
	 * 
	 */
	public function __construct()	{
		// Instance of Config
		$this->GLOBALS_INI= Configuration::getGlobalsINI();

		// Instance of BDD
		$this->oBddInit = new Database($this->GLOBALS_INI["DB_HOST"],
								   $this->GLOBALS_INI["DB_NAME"],
								   $this->GLOBALS_INI["DB_LOGIN"],
								   $this->GLOBALS_INI["DB_PSW"]);

		// Instance of Security to have $this->VARS_HTML
		$this->oSecu= new Security();
		$this->VARS_HTML= $this->oSecu->VARS_HTML;

		return $this->oBddInit;
	}

	/**
	 * Destroy security Object and Database initialization Object
	 */
	public function __destruct()	{
		// destroy Instance of Form
		unset($this->oSecu);
		// disconnect of BDD
		// destroy Instance of BDD
		unset($this->oBddInit);
	}

//End of class
}

?>

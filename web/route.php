<?php

	//SESSION START
	session_start();
	require "configuration.php";
	$GLOBALS_INI= Configuration::getGlobalsINI();


	// Class dynamic
	if ((isset($_GET["page"])) && ($_GET["page"] != ""))	{
		$monPHP= $_GET["page"];
	}  else  {
		if ((isset($_POST["page"])) && ($_POST["page"] != ""))	{
			$monPHP= $_POST["page"];
		}  else  {
			$monPHP= "index";
		}
	}



	// list of classes authorized when you are NOT connected
	$list_class = array("index", "index_ajax","forgot", "gestion","gestion_ajax");
	if(!isset($_SESSION["id_formateur"]) ||(isset($_SESSION["id_formateur"])&& $_SESSION["id_formateur"]== "")){
		if(!in_array($monPHP, $list_class)){
			$monPHP = "index";
		}		
	}

	// Test if classes exist
	if (!(file_exists($GLOBALS_INI["PATH_HOME"] . $GLOBALS_INI["PATH_CLASS"] . $monPHP . ".php"))) {
		$monPHP= "index";
	}

	$myClass= ucfirst($monPHP);

	require $GLOBALS_INI["PATH_HOME"] . $GLOBALS_INI["PATH_CLASS"] . $monPHP . ".php"; 

	$oMain= new $myClass();



	$page_to_load= "route.html";
	//if AJAX WITH JSON
	if ((isset($oMain->VARS_HTML["bJSON"])) && ($oMain->VARS_HTML["bJSON"] == 1))	{
		$page_to_load= $monPHP . ".html";
	}

	require $GLOBALS_INI["PATH_HOME"] . $GLOBALS_INI["PATH_FILES"] . $page_to_load;

	unset($oMain);
?>
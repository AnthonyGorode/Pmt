<?php
Class Database {
	
	private $_hDb;
	
	function __construct($host, $name, $login, $psw)	{
		// Connection to DB : SERVEUR / LOGIN / PASSWORD / NOM_BDD
		$this->_hDb= new PDO('mysql:host='.$host.';dbname='.$name.';charset=utf8', $login, $psw);
	}

	function __destruct()	{
		$this->_hDb= null;
	}
	
	public function getLastInsertId()	{
		error_log('getLastInsertId DETAILS = '.$this->_hDb->lastInsertId());
		return $this->_hDb->lastInsertId();
	}

	function getSelectDatas($spathSQL, $data=array())	{
		// content of SQL file
		$sql= file_get_contents($spathSQL);

		// replace variables @variable from sql by values of the same variables'name
		foreach ($data as $key => $value) {
			$sql = str_replace('@'.$key, $value, $sql);

		}

		error_log("getSelectDatas = " . $sql);

		// Execute la requete
		$results_db= $this->_hDb->prepare($sql);
		$results_db->execute();

		if (!$results_db){
			error_log("error = " . $this->_hDb->error);
		}

		$result= [];
		while ($ligne = $results_db->fetch()) {
			$new_ligne= [];
			foreach ($ligne as $key => $value) {
				if (!(is_numeric($key)))	{
//					error_log("getSelectDatas DETAILS = " . $key . " => " . $value);
					$new_ligne[$key]= $value;
				}
			}
			$result[]= $new_ligne;
		}

		return $result;
	}

	function treatDatas($spathSQL, $data=array())	{
		// content of SQL file
		$sql= file_get_contents($spathSQL);


		// replace variables @variable from sql by values of the same variables'name
		foreach ($data as $key => $value) {
			$sql= str_replace('@'.$key, $value, $sql);
		}

		error_log("treatDatas = " . $sql);

		// Execute la requete
		$results_db= $this->_hDb->query($sql);


		if (!$results_db){
			error_log("error = " . $this->_hDb->error);
		}

		return $results_db;
	}
//End of class
}
	
?>

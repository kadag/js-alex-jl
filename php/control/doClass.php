<?php
/**
 * Classe DoClass
 * encapsula el control de l'aplicació
*/
require_once "../model/users.php";


class doClass {

	static public function login($action,$user, $password)
	{
		$outPutData = array();
		$errors = array();
		$error = false;	
		$log = usersClass::login($user,$password);
		if (count($log)>0)
		{
			session_start();
			$_SESSION['usuario'] = $user; //idUser hem d'agafar

		} else {
			$outPutData[0]=true;
			$errors[]="The user or password doesn't exist";
			$error = true;
		}
		
		 return json_encode($outPutData);
	}
}
?>

<?php
/**
 * Classe DoClass
 * encapsula el control de l'aplicació
*/
require_once "../model/users.php";
require_once "../model/repositories.php";


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
		static public function registerUser($action,$name, $surnames, $email, $user, $password)
	{
		$outPutData = array();
		$errors = array();
		$error = false;
		
		
		$log = usersClass::registerUser($name,$surnames, $email, $user, $password);
		if (count($log)>0)
		{
			session_start();
			$_SESSION['usuario'] = $user; 
			
			
		} else {
			$outPutData[0]=true;
			$errors[]="The user or password doesn't exist";
			$error = true;
		}
		
		 return json_encode($outPutData);
	}
	/*
	static public function createRepo($action,$repositoryName)
	{
		$outPutData = array();
		$errors = array();
		$error = false;	
		$log = repositoriesClass::createRepo($repositoryName);
		if (count($log)>0)
		{
			//to do
		} else {
			$outPutData[0]=true;
			$errors[]="Invalid name";
			$error = true;
		}
		
		 return json_encode($outPutData);
	}*/
}
?>

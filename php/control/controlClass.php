<?php
/**
 * Classe FaCtrlClass
 * encapsula el control de l'aplicació de gestió de faltes d'assistència de l'alumnat
*/
require_once "doClass.php";
class controlClass {
    private $params;	// parametres de l'aplicacio: creats a partir dels formularis de la vista

	/**
	 * __construct()
	 * constructor de la classe
	 * parametre prmts: parametres a copiar a les propietats, provenen dels formularis de la vista
	 * autor Robert Plana
	 * versio 2012/09/18
	*/
	function __construct( $prmts )
	{
		$this->params = array();
		foreach ( $prmts as $n => $v)
		{
			$this->params[$n] = $v;
		}
	}

	/**
	 * doAccio()
	 * executa l'acció demanada des del formulari client (vista de l'aplicació)
	 * escriu el resultat del servei sol·licitat
	 * autor Robert Plana
	 * versio 2012/09/18
	*/
	public function doAccio()
	{ 
		if ( isset($this->params['action']) )
        {
           switch ( $this->params['action'] )
           {
			case '10000':
				echo doClass::login($this->params['action'], $this->params['user'],$this->params['password']);
				break;
			case '10010':
				echo doClass::registerUser($this->params['action'], $this->params['name'],$this->params['surnames'],$this->params['email'],$this->params['user'],$this->params['password']);
				break;
		   
			case '10020':
				echo doClass::createRepo($this->params['action'], $this->params['repositoryName']);
				break;
		   }

		}
	}
}
?>

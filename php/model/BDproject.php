<?php
/*
* Classe per encapsular connexió amb base de dades intraproven
* autor: Robert Plana
* versió: setembre 2012
*/
class BDproject extends mysqli
{
	function __construct()
	{
		parent::__construct(
			"localhost",
			"root",
			"",
			"project"
		);
	}
}
?>

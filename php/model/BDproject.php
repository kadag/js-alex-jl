<?php
/*
* Classe per encapsular connexi� amb base de dades intraproven
* autor: Robert Plana
* versi�: setembre 2012
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

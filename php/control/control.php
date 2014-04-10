<?php
	require_once "controlClass.php";	/* classe de control */
	
	$controlador = new controlClass( $_REQUEST );
	$controlador->doAccio();
?>

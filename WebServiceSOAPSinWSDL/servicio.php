<?php
	
	//Incluir la clase que contiene el metodo a llamar
	require_once('Calculadora.php');

	//Crear servidor de SOAP
	$server = new SoapServer(null, //No utilizar WSDL
		array('uri'=>'urn:webservices'));

	//Asignar la clase al servicio
	$server->setClass('Calculadora');

	//Atender los llamados al web service
	$server->handle();

?>
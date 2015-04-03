<?php
	//Load SOAP library
	include('funcion.php');
	require_once("lib/nusoap.php");

	ini_set('display_errors','Off');
		
	//Load library that holds implementations of functions we're making available to the web service
	//Set namespace

	$ns ="http://localhost/";
	//Create SOAP server object
	$server = new soap_server();
	//Setup WSDL file, a WSDL file can contain multiple services

	$server->soap_defencoding = 'UTF-8';
	$server->decode_utf8 = false;

	$server->configureWSDL('Coneccion a base de datos', $ns);
	$server->wsdl->schemaTargetNamespace = $ns;
	//Register a web service method

	//Parametros de entrada

	//Inicia la declaracion de array de restultados (este array se puede usar en todas las funciones ya que es un array volatil)
	
	//Termina declaracion de array

	//Inicia ws_conectar
	$server->register('ws_conectar',
		array('nombre' => 'xsd:string', 'apellido' => 'xsd:string', 'email' => 'xsd:string'), //input parameters
		array('resultado' => 'xsd:string'), //output parameters
		$ns, //Namespace
		"$ns#ws_conectar", //SOAP action
		'rpc', //style
		'encoded', //use
		'Conecta a una base de datos'); //Documentation

	function ws_conectar($nombre, $apellido, $email){
		return new soapval('return', 'xsd:string', conectar($nombre, $apellido, $email));
	}

	function conectar($nombre, $apellido, $email){
		$Objfunciones = new funcion();

		$result = $Objfunciones->conectar($nombre, $apellido, $email);
		return $result;
	}

	//Termina ws_conectar

	//Service the methods
	if ( !isset( $HTTP_RAW_POST_DATA ) ){
		$HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
	}
	$server->service($HTTP_RAW_POST_DATA);
?>
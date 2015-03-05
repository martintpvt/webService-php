<?php
	//Load SOAP library
	include('funciones.php');
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

	$server->configureWSDL('WebApp', $ns);
	$server->wsdl->schemaTargetNamespace = $ns;
	//Register a web service method

	//Parametros de entrada

	//Inicia la declaracion de array de restultados (este array se puede usar en todas las funciones ya que es un array volatil)
	$server->wsdl->addComplexType(
		'Resultado',
		'complexType',
		'struct',
		'all',
		'',
		array('val1'=>array('name'=>'val1', 'type'=>'xsd:string'),
			'val2'=>array('name'=>'val2', 'type'=>'xsd:string'))
		);

	$server->wsdl->addComplexType( 'ArrRestultado',
		'complexType',
		'array',
		'',
		'',
		array(array('ref'=>'SOAP-ENC:arrayType', 'wsdl:arrayType'=>'tns:Resultado[]')));

	$server->wsdl->addComplexType( 'Coneccion',
		'complexType',
		'struct',
		'all',
		'',
		array('album'=>array('name'=>'album', 'type'=>'xsd:string')));
	//Termina declaracion de array

	//Inicia ws_sumaDosNumeros
	$server->register('ws_sumaDosNumeros',
		array('valorUno'=>'xsd:int', 'valorDos' => 'xsd:int'), //input parameters
		array('result'=>'xsd:int'), //output parameters
		$ns, //Namespace
		"$ns#ws_sumaDosNumeros", //SOAP action
		'rpc', //style
		'encoded', //use
		'Suma dos numeros enteros'); //Documentation

	function ws_sumaDosNumeros($valorUno, $valorDos){
		return new soapval('return', 'xsd:int', sumaDosNumeros($valorUno, $valorDos));
	}

	function sumaDosNumeros($valorUno, $valorDos){
		$Objfunciones = new funciones();

		$result = $Objfunciones->sumaDosNumeros($valorUno, $valorDos);
		return $result;
	}

	//Termina ws_sumaDosNumeros

	//Inicia ws_prueba
	$server->register('ws_prueba',
		array('mensaje'=>'xsd:string'), //input parameters
		array('result'=>'tns:ArrRestultado'), //output parameters
		$ns, //Namespace
		"$ns#ws_prueba", //SOAP action
		'rpc', //style
		'encoded', //use
		'WS Prueba'); //Documentation

	function ws_prueba($mensaje){
		return new soapval('return', 'tns:ArrRestultado', prueba($mensaje));
	}

	function prueba($mensaje){
		$Objfunciones = new funciones();

		$result = $Objfunciones->prueba($mensaje);
		return $result;
	}
	//Termina ws_prueba

	//Inicia ws_sacarAlbum
	$server->register('ws_sacarAlbum',
		array('cancion'=>'xsd:string'), //input parameters
		array('album'=>'xsd:string'), //output parameters
		$ns, //Namespace
		"$ns#ws_sacarAlbum", //SOAP action
		'rpc', //style
		'encoded', //use
		'WS Sacar Album'); //Documentation

	function ws_sacarAlbum($cancion){
		return new soapval('return', 'xsd:string', sacarAlbum($cancion));
	}

	function sacarAlbum($cancion){
		$Objfunciones = new funciones();

		$album = $Objfunciones->sacarAlbum($cancion);
		return $album;
	}
	//Termina ws_sacarAlbum

	//Service the methods
	if ( !isset( $HTTP_RAW_POST_DATA ) ){
		$HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
	}
	$server->service($HTTP_RAW_POST_DATA);
?>
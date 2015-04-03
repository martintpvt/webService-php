<?php
	require_once('lib/nusoap.php');
	$wsdl = "http://localhost/webService-php/AccesoBaseDeDatos/server.php?wsdl";
	
	$client = new nusoap_client($wsdl, true);

	$result = $client->call('ws_conectar', array('nombre' => 'Martin', 'apellido'=>'Almeida', 'email'=>'martin_almeida@outlook.com'));
	//$result1 = $client->call('ws_conectar', array('nombre' => 'Nicolas', 'apellido'=>'Gachet', 'email'=>'mnalmeida@udlanet.ec'));

	if($client->fault){
		echo '<h2>Fault</h2><pre>';
		print_r($result);
		echo '</pre>';
	} else {
		$err = $client->getError();
		if($err) {
			//Display the error
			echo '<h2>Error</h2><pre>' . $err . '</pre>';
		} else {
			//Display the result
			echo '<h2>Result</h2><pre>';
			print_r($result);
			echo '</pre>';
		}
	}
?>
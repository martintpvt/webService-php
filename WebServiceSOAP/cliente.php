<?php

	require_once('lib/nusoap.php');
	$wsdl = "http://localhost/WebServiceSOAP/server.php?wsdl";

	$client = new nusoap_client($wsdl, true);

	//$result = $client->call('ws_prueba', array('mensaje'=>'Enviando un mensaje...'));
	$result = $client->call('ws_sumaDosNumeros', array('valorUno'=>30, 'valorDos'=>19));

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
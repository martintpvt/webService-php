<?php

	//Crear el cliente colocando la ruta URL donde se encuentra el servicio
	$cliente = new SoapClient(null, array('location'=>'http://localhost/WebServiceSOAP/servicio.php',
		'uri'=>'urn:webservices', )); //Llamar al metodo como si fuera del cliente

	echo $cliente->multiplicar(5, 4);

?>
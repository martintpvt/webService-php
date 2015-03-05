<?php
//Clase de funciones principales a usar
class funciones{
	//constructor
	function funciones(){

	}

	//Funcion ejemplo array
	function prueba($mensaje){
		//Arreglo
		$arrit["arreglo"][0] = "uno";
		$arrit["arreglo"][1] = "dos";
		//Mensaje
		$msg["msg"] = mensaje;

		$resultado[0] = $msg;
		$resultado[1] = $arrit;

		//Arreglo con mensaje y arreglo de restultados
		return $resultado;
	}

	//Funcion ejemplo, recibe dos valores y retorna uno
	function sumaDosNumeros($valorUno, $valorDos){
		$resultado = 0;
		$resultado = $valorUno + $valorDos;
		return $resultado;
	}

	//Funcion para sacar datos de la base
	function sacarAlbum($cancion){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$album = "";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password);
		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		return $album;
	}
}

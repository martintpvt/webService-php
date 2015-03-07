<?php
	class funcion{
		function funcion(){

		}
		function conectar(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$databse = "prueba_web_service";
			$result = "nada";
			
			//Create connection
			$conn = new mysqli_connect($servername, $username, $password, $databse);
			if(!$conn) {
				die("Connection failed");
			} else {
				$result = "Coneccion exitosa";
			}
			
			return $result;
		}
	}
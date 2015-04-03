<?php
	class funcion{
		function funcion(){

		}
		function conectar($nombre, $apellido, $email){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$db = "myDB";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $db);

			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 

			/*$sql = "drop table MyGuests";

			if ($conn->query($sql) === TRUE) {
				echo "great";
			} else {
				echo "bad";
			}*/

			$sql = "SELECT id, firstname, lastname, email FROM MyGuests";
			$result = $conn->query($sql);
			//print_r($result);
			$consultado = json_encode($result->fetch_assoc());
			//print_r(json_encode($conn->query($sql)));

			/*
			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			    }
			} else {
			    echo "0 results";
			}*/

			$conn->close();
			
			return json_decode($consultado)->id;
		}
	}
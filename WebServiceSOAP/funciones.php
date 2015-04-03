<?php
//Clase de funciones principales a usar
class funciones{
	//constructor
	function funciones(){

	}

	//Funcion ejemplo array
	function prueba($mensaje){
		//Arreglo
		$array["arreglo"][0] = "uno";
		$array["arreglo"][1] = "dos";
		//Mensaje
		$msg["msg"] = $mensaje;

		$resultado[0] = $msg;
		$resultado[1] = $array;

		//Arreglo con mensaje y arreglo de restultados
		return $resultado;
	}

	//Funcion ejemplo, recibe dos valores y retorna uno
	function sumaDosNumeros($valorUno, $valorDos){
		$resultado = 0;
		$resultado = $valorUno + $valorDos;
		return $resultado;
	}
}

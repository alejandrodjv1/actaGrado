<?php
	
	function conectar(){
		$user="root";
		$pass="";
		$host="localhost";
		$bd="bienes_desincorporados";

		$conn=mysqli_connect($host,$user,$pass) or die ("ERROR".mysql_error());

		mysqli_select_db($conn,$bd);
		
		return $conn;

	}
	if ($conn=conectar()) 
			echo " ";
		else if ($conn!=conectar())
			echo "No se realizo la conexion...<br>";	
		
?>
<?php
	include ("conexion.php");
	$conn=conectar();

	$escuela = $_REQUEST['escuela'];

	$query="DELETE  
			FROM escuela  
			WHERE escuela=$escuela
			";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Borrado no exitoso";
	}
?>
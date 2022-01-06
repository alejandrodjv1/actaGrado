<?php
	include ("conexion.php");
	$conn=conectar();

	$escuela     	= $_REQUEST['escuela'];
	$descripcion	= $_POST['descripcion'];
	
	$query="	UPDATE  escuela 
				SET 	descripcion	='$descripcion' 
				WHERE 	escuela		='$escuela' 
			";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
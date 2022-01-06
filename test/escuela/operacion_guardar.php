<?php
	include ("conexion.php");
	$conn=conectar();

	$escuela    	= $_POST['escuela'];
	$descripcion	= $_POST['descripcion'];
			
	$query="	INSERT INTO escuela   (escuela, descripcion) 
				VALUES  			('$escuela','$descripcion')
			";

	 $res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Insercion noooooo exitosa";
	}
?>


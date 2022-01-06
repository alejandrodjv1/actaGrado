<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_a    	= $_POST   ['ci_a'];
	$nombre		= $_POST['nombre'];
	$escuela  	= $_POST['escuela'];
	$mat_Pend	= $_POST['mat_Pend'];
	$nota_Proy	= $_POST['nota_Proy'];
	
	$query="
	INSERT INTO alumno   (ci_a,   nombre,   escuela,   mat_Pend,   nota_Proy) 
				VALUES ('$ci_a','$nombre','$escuela','$mat_Pend','$nota_Proy')
			";

	 $res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Insercion noooooo exitosa";
	}
?>


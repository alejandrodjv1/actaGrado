<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_a     	= $_REQUEST['ci_a'];
	$nombre   	= $_POST['nombre'];
	$escuela  	= $_POST['escuela'];
	$mat_Pend 	= $_POST['mat_Pend'];
	$nota_Proy	= $_POST['nota_Proy'];

	$query="
	UPDATE  	alumno SET nombre='$nombre',
							escuela='$escuela',
							mat_Pend='$mat_Pend',
							nota_Proy='$nota_Proy' 
						WHERE ci_a='$ci_a' 
			";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
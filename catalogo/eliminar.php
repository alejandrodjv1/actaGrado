<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_a = $_REQUEST['ci_a'];

	$query="DELETE FROM alumno  WHERE ci_a='$ci_a' ";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Borrado no exitoso";
	}
?>
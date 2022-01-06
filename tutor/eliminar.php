<?php
	include ("conexion.php");
	$conn=conectar();

	$id_jurado = $_REQUEST['id_jurado'];

	$query="DELETE FROM jurado  WHERE id_jurado='$id_jurado' ";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Borrado no exitoso";
	}
?>
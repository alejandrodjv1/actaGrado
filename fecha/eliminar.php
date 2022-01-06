<?php
	include ("conexion.php");
	$conn=conectar();

	$id_fecha = $_REQUEST['id_fecha'];
	$estatus_fecha_tesis = $_REQUEST['estatus_fecha_tesis'];

	if($estatus_fecha_tesis==0){
		$query="DELETE FROM fecha  WHERE id_fecha=$id_fecha ";
		$res=$conn->query($query);
		if($res) {
			header("Location: tabla.php");
		}
	}else{
		header("Location: mensaje_1.php");
	}

?>
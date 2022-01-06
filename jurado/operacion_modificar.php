<?php
	include ("conexion.php");
	$conn=conectar();

	$id_jurado     	= $_REQUEST['id_jurado'];
	$id_tesis     	= $_REQUEST['id_tesis'];
	$ci_jurado_1     	= $_REQUEST['ci_jurado_1'];
	$ci_jurado_2     	= $_REQUEST['ci_jurado_2'];
	$ci_jurado_3     	= $_REQUEST['ci_jurado_3'];
	
	$query="
	UPDATE  	jurado SET    id_jurado='$id_jurado',
							   id_tesis='$id_tesis',
							ci_jurado_1='$ci_jurado_1',
							ci_jurado_2='$ci_jurado_2',
							ci_jurado_3='$ci_jurado_3'
						WHERE      id_jurado='$id_jurado' 
			";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
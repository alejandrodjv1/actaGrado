<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_p     	  = $_POST['ci_p'];
	$id_jurado_1 = $_REQUEST['id_jurado_1'];
	$estatus_jurado= 0;

	$query1="	UPDATE 	profesor 
				SET estatus_jurado_1='$estatus_jurado'
				WHERE ci_p=$ci_p
			";
	$res1=$conn->query($query1);
	$query="DELETE FROM jurado_1  WHERE id_jurado_1=$id_jurado_1 ";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Borrado no exitoso";
	}
?>
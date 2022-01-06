<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_p     	  = $_POST['ci_p'];
	$id_tutor = $_REQUEST['id_tu_acad'];
	$estatus_tutor_acad= 0;

	$query1="	UPDATE 	profesor 
				SET estatus_tu_acad_pr='$estatus_tutor_acad'
				WHERE ci_p=$ci_p
			";
	$res1=$conn->query($query1);
	$query="DELETE FROM tutor_acad  WHERE id_tu_acad=$id_tutor ";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Borrado no exitoso";
	}
?>
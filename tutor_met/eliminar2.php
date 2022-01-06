<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_p     	  = $_POST['ci_p'];
	$id_tutor = $_REQUEST['id_tu_met'];
	$estatus_tutor_met= 0;

	$query1="	UPDATE 	profesor 
				SET estatus_tu_met_pr='$estatus_tutor_met'
				WHERE ci_p=$ci_p
			";
	$res1=$conn->query($query1);
	$query="DELETE FROM tutor_met  WHERE id_tu_met=$id_tutor ";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Borrado no exitoso";
	}
?>
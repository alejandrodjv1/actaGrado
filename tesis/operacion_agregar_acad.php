<?php
	include ("conexion.php");
	$conn=conectar();

	$id_tesis_te  	= $_POST['id_tesis_te'];
	$id_tu_acad	  	= $_POST['id_tu_acad'];
	$ced_tutor_acad = $_POST['ced_tutor_acad'];
	$nom_tutor_acad = $_POST['nom_tutor_acad'];
	$es_tu_acad  	= $_POST['escuela'];
	
	$query="	UPDATE tesis 
				SET id_tutor_acad=$id_tu_acad
				WHERE   id_tesis_te=$id_tesis_te
			";
			
	$res=$conn->query($query);
	if($res) {
		$estatus_tutor_acad=1;
		$query="	UPDATE tutor_acad 
				SET id_tesis_acad=$estatus_tutor_acad
				WHERE   id_tutor_acad=$id_tu_acad
			";
											
		header("Location: tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
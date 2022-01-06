<?php
	include ("conexion.php");
	$conn=conectar();

	$id_tesis_te  = $_POST['id_tesis_te'];
	$id_jurado_3  = $_POST['id_jurado_3'];
	$id_p  		  = $_POST['id_p'];
	$ci_p     	  = $_POST['ci_p'];
	$nom_p   	  = $_POST['nom_p'];
	$es_p  		  = $_POST['es_p'];
	$estatus_tutor_acad= $_POST['$estatus_tutor_acad'];
	$estatus_jurado_2=1;

	$query="	UPDATE tesis 
				SET id_jurado_3=$id_jurado_3
				WHERE id_tesis_te=$id_tesis_te";
	$res=$conn->query($query);
	if($res){
		$query="	UPDATE profesor 
				SET estatus_jurado_3=$estatus_jurado_3
				WHERE ci_p=$ci_p";
		//echo $query.$query1.$estatus_tutor_met;
		header("Location: tabla.php");
	}else{
		echo "Modificacion no exitosa";
	}
?>
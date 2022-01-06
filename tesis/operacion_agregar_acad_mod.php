<?php
	include ("conexion.php");
	$conn=conectar();

	$id_tesis_te  = $_POST['id_tesis_te'];
	$id_tu_acad	  = $_POST['id_tu_acad'];
	$ci_p     	  = $_POST['ci_p'];
	$nom_p   	  = $_POST['nom_p'];
	$es_p  		  = $_POST['es_p'];
	$ced_tesis		  = $_POST['ced_tesis'];

	$query="	UPDATE tesis 
				SET id_tutor_acad=$id_tu_acad
				WHERE id_tesis_te=$id_tesis_te
			";
			
	$res=$conn->query($query);
	if($res){
		//echo $query.$id_tu_met;
		header("Location: modificar.php?id_tesis_te=$id_tesis_te&ced_tesis=$ced_tesis");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
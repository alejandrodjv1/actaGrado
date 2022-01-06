<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_p     	  = $_POST['ci_p'];
	$nom_p   	  = $_POST['nom_p'];
	$es_p  		  = $_POST['es_p'];
	$id_p  = $_POST['id_p'];
	$query="	UPDATE tesis 
				SET id_jurado_2=$id_p
				WHERE id_jurado_2=0
			";
	$res=$conn->query($query);
	if($res){
		//echo $query.$query1.$estatus_tutor_met;
		header("Location: formulario_5.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
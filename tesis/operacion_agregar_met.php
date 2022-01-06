<?php
	include ("conexion.php");
	$conn=conectar();

	$id_tesis_te  = $_POST['id_tesis_te'];
	$ci_a 		  = $_POST['ci_a'];
	$id_tu_met	  = $_POST['id_tu_met'];
	$ced_tutor_met     	  = $_POST['ced_tutor_met'];
	$nom_tutor_met   	  = $_POST['nom_tutor_met'];
	$es_tu_met 		  = $_POST['escuela'];

	$query="	UPDATE tesis 
				SET id_tutor_met=$id_tu_met
				WHERE id_tesis_te=$id_tesis_te
			";
			
	$res=$conn->query($query);
	if($res){
		//echo $query.$id_tu_met;
		header("Location: formulario_2.php?id_tesis_te=$id_tesis_te&ci_a=$ci_a&escuela=$es_tu_met");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
<?php
	include ("conexion.php");
	$conn=conectar();

	$id_tesis   	= $_REQUEST['id_tesis_te'];
	$ci_a   	  	= $_POST['ced_tesis'];
	$nom_a			= $_POST['nom_tesis'];
	$es_tesis		= $_POST['es_tesis'];
	$titulo  		= $_POST['titulo_tesis'];
	
	
	$query="UPDATE  tesis 
			SET 		
								ced_tesis='$ci_a',
								nom_tesis='$nom_a',
								es_tesis='$es_tesis',
						  		titulo_tesis='$titulo'
			WHERE 			id_tesis_te=$id_tesis
			";
	$res=$conn->query($query);
	$query1="UPDATE  alumno
			SET 		
								ci_a='$ci_a',
								nom_a='$nom_a',
								es_a='$es_tesis'
			WHERE 			ci_a=$ci_a
			";
	$res1=$conn->query($query1);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
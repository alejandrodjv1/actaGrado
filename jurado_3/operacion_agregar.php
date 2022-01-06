<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_p     	  = $_POST['ci_p'];
	$nom_p   	  = $_POST['nom_p'];
	$es_p  		  = $_POST['es_p'];
	
	$estatus_jurado=1;

	$id_tesis_jurado_3=0;
	
	
	$query1="	UPDATE 	profesor 
				SET estatus_jurado_3=$estatus_jurado
				WHERE ci_p='$ci_p'
			";
	$res1=$conn->query($query1);
	if($res1) {
		$query="	INSERT INTO jurado_3
								(
									ci_jur_3,
									nom_ju_3,
									es_jurado_3,
									id_tesis_jurado_3)
					VALUES 		(
									'$ci_p',
									'$nom_p',
									'$es_p',
									'$id_tesis_jurado_3') 
					";
			
		$res=$conn->query($query);
		//echo $query.$query1.$estatus_jurado;
		header("Location: tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
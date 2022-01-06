<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_p     	  = $_POST['ci_p'];
	$nom_p   	  = $_POST['nom_p'];
	$es_p  		  = $_POST['es_p'];

	$estatus_jurado= 1;

	$id_tesis_jurado_2=0;
	
	
	$query1="	UPDATE 	profesor 
				SET estatus_jurado_2=$estatus_jurado
				WHERE ci_p='$ci_p'
			";
	$res1=$conn->query($query1);
	if($res1) {
		$query="	INSERT INTO jurado_2
								(
									ci_jur_2,
									nom_ju_2,
									es_jurado_2,
									id_tesis_jurado_2)
					VALUES 		(
									'$ci_p',
									'$nom_p',
									'$es_p',
									'$id_tesis_jurado_2') 
					";
			
		$res=$conn->query($query);
		//echo $query.$query1.$estatus_jurado;
		header("Location: tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
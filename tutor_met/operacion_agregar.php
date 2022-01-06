<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_p     	  = $_POST['ci_p'];
	$nom_p   	  = $_POST['nom_p'];
	$es_p  		  = $_POST['es_p'];
	
	$estatus_tutor_met= 1;
	$id_tesis_met=0;
	
	
	$query1="	UPDATE 	profesor 
				SET estatus_tu_met_pr=$estatus_tutor_met
				WHERE ci_p=$ci_p
			";
	$res1=$conn->query($query1);
	if ($res1) {
		$query="	INSERT INTO tutor_met
								(
									ced_tutor_met,
									nom_tutor_met,
									esc_tu_met,
									id_tesis_met)
					VALUES 
								(
									'$ci_p',
									'$nom_p',
									'$es_p',
									'$id_tesis_met'
								)";
			
		$res=$conn->query($query);
		//echo $query.$query1.$estatus_tutor_met;
		header("Location: tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
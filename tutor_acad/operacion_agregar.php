<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_p     	  = $_POST['ci_p'];
	$nom_p   	  = $_POST['nom_p'];
	$es_p  		  = $_POST['es_p'];
	
	$estatus_tutor_acad= 1;
	$id_tesis_acad=0;
	
	
	$query1="	UPDATE 	profesor 
				SET estatus_tu_acad_pr=$estatus_tutor_acad
				WHERE ci_p='$ci_p'
			";
	$res1=$conn->query($query1);
	if($res1) {
		$query="	INSERT INTO tutor_acad
								(
									ced_tutor_acad,
									nom_tutor_acad,
									esc_tu_acad,
									id_tesis_acad)
					VALUES 		(
									'$ci_p',
									'$nom_p',
									'$es_p',
									'$id_tesis_acad') 
					";
			
		$res=$conn->query($query);
		//echo $query.$query1.$estatus_tutor_acad;
		header("Location: tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
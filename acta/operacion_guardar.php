<?php
	include ("conexion.php");
	$conn=conectar();

	$id_acta    	= $_POST['id_acta'];
	$escuela    	= $_POST['escuela'];
	$semestre    	= $_POST['semestre'];
	$año	    	= $_POST['año'];
	$id_tesis		= $_POST['id_tesis'];
	$id_menc	  	= $_POST['id_menc'];
	$nota			= $_POST['nota'];
	$id_jurado		= $_POST['id_jurado'];

	
	$query="	INSERT INTO acta  (id_acta, escuela, semestre, año, id_tesis, id_menc, nota, id_jurado) 
				VALUES ('$id_acta', '$escuela', '$semestre', '$año', '$id_tesis', '$id_menc', '$nota', '$id_jurado')
			";
	 $res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Insercion noooooo exitosa";
	}
?>


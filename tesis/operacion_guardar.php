<?php
	include ("conexion.php");
	$conn=conectar();

	$id_tesis     	= $_POST['id_tesis'];
	$ci_a   		= $_POST['ci_a'];
	$titulo  		= $_POST['titulo_tesis'];
	$id_jurado	 	= $_POST['id_jurado'];
	$id_fecha	 	= $_POST['id_fecha'];
	$id_tutor	 	= $_POST['id_tutor'];

	$query="INSERT INTO tesis (id_tesis,   ci_a,   titulo_tesis, id_jurado,   id_fecha,   id_tutor) 
			VALUES 			('$id_tesis','$ci_a','$titulo',    '$id_jurado','$id_fecha','$id_tutor')
			";
		
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Insercion noooooo exitosa";
	}
?>


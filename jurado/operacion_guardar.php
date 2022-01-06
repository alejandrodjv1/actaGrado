<?php
	include ("conexion.php");
	$conn=conectar();

	$id_jurado    	= $_POST   ['id_jurado'];
	$id_tesis    	= $_POST   ['id_tesis'];
	$ci_jurado_1	= $_POST['ci_jurado_1'];
	$ci_jurado_2	= $_POST['ci_jurado_2'];
	$ci_jurado_3	= $_POST['ci_jurado_3'];
	if( ($ci_jurado_1!=$ci_jurado_2)&&
		($ci_jurado_1!=$ci_jurado_3)&&
		($ci_jurado_2!=$ci_jurado_3) ){
			$query="
			INSERT INTO jurado   
				(  id_jurado,   ci_jurado_1,   ci_jurado_2,   ci_jurado_3) 
			VALUES 	
				('$id_jurado','$ci_jurado_1','$ci_jurado_2','$ci_jurado_3')
					";
			$res=$conn->query($query);

			if($res) {
				header("Location: tabla.php");
			}
			else {
				echo "Insercion noooooo exitosa";
			}
	}else{
		header("Location: formularioErrJu.php");
	}
?>


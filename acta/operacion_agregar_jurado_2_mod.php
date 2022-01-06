<?php
	include ("conexion.php");
	$conn=conectar();

	$id_acta            =$_REQUEST['id_acta'    ];
    $id_jurado_2        =$_REQUEST['id_jurado_2'];
	
	$query="	UPDATE acta 
				SET id_jurado_2='$id_jurado_2'
				WHERE id_acta='$id_acta' ";
	$res=$conn->query($query);
	if($res){
		//echo $query.$query1.$estatus_tutor_met;
		header("Location: tabla.php");
	}
	else{
		echo "Insercion no exitoso";
	}		
?>
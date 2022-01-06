<?php
	include ("conexion.php");
	$conn=conectar();

	$id_acta            =$_REQUEST['id_acta'    ];
    $escuela            =$_REQUEST['escuela'    ];
    $ced_tutor_acad	    =$_REQUEST['ced_tutor_acad'];
    $id_jurado_1        =$_REQUEST['id_jurado_1'];

	$query="	UPDATE acta 
				SET id_jurado_1='$id_jurado_1'
				WHERE id_acta='$id_acta'";
	$res=$conn->query($query);
	if($res){
		//echo $query.$query1.$estatus_tutor_met;
		header("Location: tabla.php");
	}
	else{
		echo "Insercion no exitoso";
	}
?>
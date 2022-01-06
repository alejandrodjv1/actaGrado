<?php
	include ("conexion.php");
	$conn=conectar();
	$id_acta            =$_REQUEST['id_acta'    ];
    $id_tesis_te        =$_REQUEST['id_tesis_te'];
    $escuela            =$_REQUEST['escuela'    ];
    $ced_tutor_acad	    =$_REQUEST['ced_tutor_acad'];
    $ced_tesis          =$_REQUEST['ced_tesis'  ];
    $id_jurado_3        =$_REQUEST['id_jurado_3'];
	
	$query="	UPDATE acta 
				SET id_jurado_3='$id_jurado_3'
				WHERE id_acta='$id_acta'";
	//echo $query;
	
	$res=$conn->query($query);
	if($res){
		$estatus_acta=1;
		$query="	UPDATE tesis 
				SET estatus_acta='$estatus_acta'
				WHERE id_tesis_te='$id_tesis_te'";
		//echo $query;
		$res1=$conn->query($query);
		if($res1){
			$query="	UPDATE alumno
				SET estatus_acta='$estatus_acta'
				WHERE ced_tesis='$ced_tesis'";
			
				//echo $query.$query1.$estatus_tutor_met;
				header("Location: tabla.php");
			
		}
	}
	else{
		echo "Insercion no exitoso";
	}
?>
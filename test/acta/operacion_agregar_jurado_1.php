<?php
	include ("conexion.php");
	$conn=conectar();

	$id_acta            =$_REQUEST['id_acta'    ];
    $id_tesis_te        =$_REQUEST['id_tesis_te'];
    $escuela            =$_REQUEST['escuela'    ];
    $ced_tutor_acad	    =$_REQUEST['ced_tutor_acad'];
    $ced_tesis          =$_REQUEST['ced_tesis'  ];
    $id_jurado_1        =$_REQUEST['id_jurado_1'];


	$query="	UPDATE acta 
				SET id_jurado_1=$id_jurado_1
				WHERE id_acta=$id_acta";
	$res=$conn->query($query);
	if($res){
		//echo $query.$query1.$estatus_tutor_met;
		header("Location: formulario_4.php?id_acta=$id_acta&id_tesis_te=$id_tesis_te&escuela=$escuela&ced_tutor_acad=$ced_tutor_acad&ced_tesis=$ced_tesis");
	}
	else{
		echo "Insercion no exitoso";
	}
?>
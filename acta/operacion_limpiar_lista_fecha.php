<?php
	include ("conexion.php");
	$conn=conectar();

	$id_fecha     	 	= $_GET['id_fecha' ];
	$id_acta	  		= $_GET['id_acta'	];
	$estatus_fecha_tesis= $_GET['estatus_fecha_tesis'];
	
	$query="UPDATE acta 
				SET   id_fecha_te='$id_fecha'
				WHERE id_acta='$id_acta' ";
	echo $query;
	$res=$conn->query($query);
	if($res){
		$estatus_fecha_tesis=0;
		$query1="UPDATE fecha 
				SET  estatus_fecha_tesis='$estatus_fecha_tesis'
				WHERE id_fecha='$id_fecha' ";
		echo $query1;
		$res1=$conn->query($query1);
		if($res1){
			//echo $query.$query1.$id_fecha;
			header("Location: formulario_fecha.php?id_acta=$id_acta&id_fecha=$id_fecha");
		}
	}else{
		echo "Fecha no agregada a tesis";
	}
?>
<?php
	include ("conexion.php");
	$conn=conectar();

	$id_fecha     	 	= $_POST['id_fecha' ];
	$id_acta	  		= $_POST['id_acta'	];
	$estatus_fecha_tesis= $_POST['estatus_fecha_tesis'];
	
	$query="UPDATE acta 
				SET   id_fecha_te='$id_fecha'
				WHERE id_acta='$id_acta' ";
	echo $query;
	$res=$conn->query($query);
	if($res){
		$estatus_fecha_tesis=1;
		$query1="UPDATE fecha 
				SET  estatus_fecha_tesis='$estatus_fecha_tesis'
				WHERE id_fecha='$id_fecha' ";
		echo $query1;
		$res1=$conn->query($query1);
		if($res1){
			//echo $query.$query1.$id_fecha;
			header("Location: tabla.php");
		}
	}else{
		echo "Fecha no agregada a tesis";
	}
?>
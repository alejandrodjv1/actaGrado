<?php
	include ("conexion.php");
	$conn=conectar();

	$id_fecha     	  = $_POST['id_fecha' ];
	
	$id_tesis_te	  = $_POST['id_tesis_te'];
	
	$estatus_fecha_tesis	  = $_POST['estatus_fecha_tesis'];
	
	$query="UPDATE tesis 
				SET   id_fecha_te='$id_fecha'
				WHERE id_tesis_te='$id_tesis_te'
				";
	$res=$conn->query($query);
	if($res){
		$estatus_fecha_tesis=1;
		$query1="UPDATE fecha 
				SET  estatus_fecha_tesis='$estatus_fecha_tesis'
				WHERE id_fecha='$id_fecha' ";
		$res1=$conn->query($query1);
		if($res1){
			//echo $query.$query1.$id_fecha;
			header("Location: tabla.php");
		}
	}else{
		echo "Fecha no agregada a tesis";
	}
?>
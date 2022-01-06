<?php
	include ("conexion.php");
	$conn=conectar();

	
	$id_tesis 			= $_REQUEST['id_tesis_te'];
	$id_fecha     	  	= $_REQUEST['id_fecha'];
	$ci_aa				= $_REQUEST['ced_tesis'];
	
	$query="DELETE FROM tesis  WHERE id_tesis_te='$id_tesis' ";
	$res=$conn->query($query);
	if($res){
		$estatus_tesis=0;
		$query2="	UPDATE 	alumno 
					SET estatus_tesis='$estatus_tesis'
					WHERE ci_a='$ci_aa'
				";
		$res2=$conn->query($query2);
		$estatus_fecha_tesis=0;
		$query3="	UPDATE 	fecha 
					SET estatus_fecha_tesis='$estatus_fecha_tesis'
					WHERE id_fecha='$id_fecha'
				";
		$res3=$conn->query($query3);
		header("Location: tabla.php");
		//echo $query."  ".$query2."  ".$query3;
	}else{
		echo "Borrado no exitoso";
		//echo $query.$query2;
	}
		
?>
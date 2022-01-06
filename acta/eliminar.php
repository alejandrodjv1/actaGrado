<?php
	include ("conexion.php");
	$conn=conectar();

	$id_acta		 		= $_REQUEST['id_acta'];
	$id_tesis_te	 		= $_REQUEST['id_tesis_te'];
	$ci_a 			 		= $_REQUEST['ci_a'];
	$estatus_fecha_tesis	= $_REQUEST['estatus_fecha_tesis'];
	$id_fecha 				= $_REQUEST['id_fecha'];
	
	$query="DELETE FROM acta  WHERE id_acta=$id_acta ";
	$res=$conn->query($query);
	if($res){
		$estatus_acta= 0;
		$query="	UPDATE 	alumno 
				SET estatus_acta=$estatus_acta
				WHERE ci_a='$ci_a' ";
		//echo $query;
		$estatus_acta= 0;
		$query="UPDATE 	tesis 
				SET estatus_acta=$estatus_acta
				WHERE id_tesis_te='$id_tesis_te' ";
		echo $query2;
		$res2=$conn->query($query2);
		$estatus_fecha_tesis=0;
		$query3="	UPDATE 	fecha 
				SET estatus_fecha_tesis='$estatus_fecha_tesis'
				WHERE id_fecha='$id_fecha'
					";
		echo $query4;
		header("Location: tabla.php");
	}else{
		echo "Borrado no exitoso";
	}
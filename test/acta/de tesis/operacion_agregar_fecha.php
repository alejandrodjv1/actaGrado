<?php
	include ("conexion.php");
	$conn=conectar();

	$id_fecha     	  = $_POST['id_fecha' ];
	$fecha_pre   	  = $_POST['fecha_pre'];
	$hora_pre  		  = $_POST['hora_pre' ];
	$aula_pre  		  = $_POST['aula_pre' ];
	$fecha_def   	  = $_POST['fecha_def'];
	$hora_pre  		  = $_POST['hora_def' ];
	$aula_def  		  = $_POST['aula_def' ];
	$semestre  		  = $_POST['semestre' ];
	
	$estatus_fecha_tesis=1;
	
	$query1="UPDATE fecha 
			SET estatus_fecha_tesis=$estatus_fecha_tesis
			WHERE id_fecha=0
			";
	$res1=$conn->query($query1);

	$query="UPDATE tesis 
			SET id_fecha_te=$id_fecha
			WHERE id_fecha_te=0
		";
	$res=$conn->query($query);
	if($res) {
	//echo $query.$query1.$estatus_tutor_met;
	header("Location: tabla.php");
}
else{
	echo "Fecha no agregada a tesis";
}
?>
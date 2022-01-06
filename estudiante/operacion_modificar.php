<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_a     	= $_REQUEST['ci_a'];
	$nom_a   	= $_POST['nom_a'];
	$es_a  		= $_POST['es_a'];
	$mat_pend 	= $_POST['mat_pend'];
	$titulo_tesis	= $_POST['titulo_tesis_al'];
	$nota_proy	= $_POST['nota_proy'];

	$query="UPDATE  alumno 
			SET 	nom_a	='$nom_a',
					es_a	='$es_a',
					mat_ped='$mat_pend',
					titulo_tesis	='$titulo_tesis',
					nota_proy='$nota_proy'

			WHERE 	ci_a 	=$ci_a ";
	$res=$conn->query($query);
	if($res){
		header("Location: tabla.php");
	}else{
		header("Location: modificar.php");
	}
?>
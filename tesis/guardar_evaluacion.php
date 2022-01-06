<?php
	include ("conexion.php");
	$conn=conectar();

	$id_tesis   	= $_REQUEST['id_tesis_te'];
	$id_menc		= $_POST['id_menc'];
	$nota_ac  		= $_POST['nota_ac'];
	
	
	$estatus_acta=1;
	
	$query1="UPDATE tesis 
			SET estatus_acta=$estatus_acta
			WHERE id_tesis_te=$id_tesis
			";
	$res1=$conn->query($query1);
	$query="INSERT INTO acta (id_tesis,   id_menc, nota_ac) 
			VALUES 			('$id_tesis','$id_menc','$nota_ac')
			";
		
	$res=$conn->query($query);

	if($res) {
		//echo $nota_ac;
		header("Location: ../acta/tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
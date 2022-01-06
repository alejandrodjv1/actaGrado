<?php
	include ("conexion.php");
	$conn=conectar();

	$id_acta		= $_REQUEST['id_acta'];
	$nota  				= $_POST['nota_ac'];
	$id_menc			= $_POST['id_menc'];
	
	
	$query="	UPDATE acta 
				SET nota_ac='$nota',
					id_menc='$id_menc'
					
				WHERE id_acta='$id_acta'
			";

	
	$res=$conn->query($query);
	if($res){
		//echo $query.$nota_ac;
		header("Location: tabla.php");
	}else{
		echo "Modificacion no exitosa";
	}
?>
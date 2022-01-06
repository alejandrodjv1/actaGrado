<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_p = $_REQUEST['ci_p'];
	
			$query="DELETE 
					FROM profesor  
					WHERE ci_p=$ci_p 
					";
			$res=$conn->query($query);

			if($res) {
				header("Location: tabla.php");
			}
			else {
				echo "Borrado no exitoso";
			}
	
?>
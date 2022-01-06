<?php
	include ("conexion.php");
	$conn=conectar();

	
	$id_tesis		= $_REQUEST['id_tesis_te'];
	$escuela		= $_REQUEST['escuela'];
	$ced_tutor_acad		= $_REQUEST['ced_tutor_acad'];
	$ci_a			= $_REQUEST['ci_a'];
		
		$estatus_acta= 1;
		$query="	UPDATE 	alumno 
					SET estatus_acta='$estatus_acta'
					WHERE ci_a='$ci_a' ";
		$res1=$conn->query($query);
		if($res1){
			$estatus_acta=1;
			$query="	UPDATE 	tesis 
						SET estatus_acta='$estatus_acta'
						WHERE id_tesis_te='$id_tesis' ";
			$res2=$conn->query($query);
			if($res2){
				$query3="INSERT INTO acta(id_tesis)VALUES('$id_tesis')";
				$res3=$conn->query($query3);
				if($res3){
					$query4="SELECT  id_acta FROM acta WHERE id_acta = (SELECT MAX(id_acta) FROM acta )	";
					$res4=$conn->query($query4);
					while($row=$res4->fetch_assoc()){
						$id_acta=$row['id_acta'];
					}
					header("Location: formulario_3.php?id_acta=$id_acta&id_tesis_te=$id_tesis&escuela=$escuela&ced_tesis=$ci_a&ced_tutor_acad=$ced_tutor_acad");
				}
			}
		}
		else{
		echo "Insercion no exitoso";
		}
?>


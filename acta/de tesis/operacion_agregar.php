<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_a     	  = $_POST['ci_a'];
	$nom_a   	  = $_POST['nom_a'];
	$escuela   	  = $_POST['escuela'];
	$titulo   	  = $_POST['titulo_tesis'];
	$id_tu_met  = $_POST['id_tu_met'];

	
		$query1="	INSERT INTO tesis
								(
									ced_tesis,
									nom_tesis,
									es_tesis,
									titulo_tesis
									
									
								)
					VALUES 		(
									'$ci_a',
									'$nom_a',
									'$escuela',
									'$titulo'
								) 
					";
	

		$res1=$conn->query($query1);
		if($res1) {
			$estatus_tesis= 1;
			$query="	UPDATE 	alumno 
						SET estatus_tesis='$estatus_tesis'
						WHERE ci_a=$ci_a
					";

			$query="SELECT  id_tesis_te
						FROM tesis 
						WHERE id_tesis_te = (SELECT MAX(id_tesis_te) FROM tesis )
						";
			$res=$conn->query($query);
			while($row=$res->fetch_assoc()){
				$id_tesis_te=$row['id_tesis_te'];
			}
			//echo $query.$query1.$estatus_tesis;
				header("Location: formulario_1.php?id_tesis_te=$id_tesis_te");
			}else {
				echo "Modificacion no exitosa";
			}
?>
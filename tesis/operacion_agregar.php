<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_a     	  = $_POST['ci_a'];
	$nom_a   	  = $_POST['nom_a'];
	$escuela   	  = $_POST['escuela'];
	$titulo   	  = $_POST['titulo_tesis'];
	

	
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

			$query2="	UPDATE 	alumno 
						SET estatus_tesis='$estatus_tesis'
						WHERE ci_a='$ci_a'
					";
			$res2=$conn->query($query2);

			$query3="SELECT  id_tesis_te
						FROM tesis 
						WHERE id_tesis_te = (SELECT MAX(id_tesis_te) FROM tesis )
						";
			$res3=$conn->query($query3);

			while($row=$res3->fetch_assoc()){
				$id_tesis_te=$row['id_tesis_te'];
			}
				//echo $query.$query1.$estatus_tesis;
				//echo $query2.$query.$id_tesis_te;
				header("Location: formulario_1.php?id_tesis_te=$id_tesis_te&ci_a=$ci_a&escuela=$escuela");
			}else {
				echo $query1.$res1;
				echo $query2;
				echo $query3;
				echo "Modificacion no exitosa";
			}
?>
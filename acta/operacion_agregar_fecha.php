<?php
	include ("conexion.php");
	$conn=conectar();

	$id_fecha     	 	= $_POST['id_fecha' ];
	$id_acta	  		= $_POST['id_acta'	];
	$estatus_fecha_tesis=0;
	
	

	$query3="SELECT  id_acta FROM acta WHERE id_acta = (SELECT MAX(id_acta) FROM acta )";
	$res3=$conn->query($query3);
	while($row=$res3->fetch_assoc()){
				$id_acta =$row['id_acta'];
			}

	$query="UPDATE acta 
				SET   id_fecha_a='$id_fecha'
				WHERE id_acta='$id_acta' ";
	echo $query;
	$res=$conn->query($query);
	if($res){
		$estatus_fecha_tesis=1;
		$query1="UPDATE fecha 
				SET  estatus_fecha_tesis='$estatus_fecha_tesis'
				WHERE id_fecha='$id_fecha' ";
		echo $query1;
		$res1=$conn->query($query1);
		if($res1){
			//echo $query.$query1.$id_fecha;
			header("Location: tabla.php");
		}
	}else{
		echo "Fecha no agregada a tesis";
	}
?>
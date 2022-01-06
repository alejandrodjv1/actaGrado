<?php
session_start();
error_reporting(0);
$_SESSION['existe']=0;
?>
<?php
	include ("conexion.php");
	$conn=conectar();
	$continuar=1;

	$ci_a    	= $_POST['ci_a'];
	$nom_a		= $_POST['nom_a'];
	$es_a  		= $_POST['es_a'];
	$mat_pend	= $_POST['mat_pend'];
	$titulo_tesis	= $_POST['titulo_tesis_al'];
	$nota_proy	= $_POST['nota_proy'];
	$estatus_tesis=0;

	$query="SELECT * FROM alumno WHERE ci_a='$ci_a'";
   	$res=$conn->query($query);
   	if (mysqli_num_rows($res) > 0) {
   		header("Location: formulario.php");
   		$continuar=0;
   		$_SESSION['existe']=1;
   	}
   	if ($continuar==1){
		$query="	INSERT INTO alumno   
								(ci_a,   
								nom_a,   
								es_a,   
								mat_ped,
								titulo_tesis,
								estatus_tesis,   
								nota_proy) 
					VALUES 		('$ci_a',
								'$nom_a',
								'$es_a',
								'$mat_pend',
								'$titulo_tesis',
								'$estatus_tesis',
								'$nota_proy')
				";

		 $res=$conn->query($query);

		if($res) {
			header("Location: tabla.php");
		}
		else {
			echo "Insercion noooooo exitosa";
		}
	}
?>


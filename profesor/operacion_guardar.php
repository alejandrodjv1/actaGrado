<?php
session_start();
error_reporting(0);
$_SESSION['existe']=0;
?>
<?php
	include ("conexion.php");
	$conn=conectar();
	$continuar=1;
	$ci_p     	= $_REQUEST['ci_p'];
	$nom_p   	= $_POST['nom_p'];
	$es_p  		= $_POST['es_p'];
	$activo 	= $_POST['activo'];
	
	$query="SELECT * FROM profesor WHERE ci_p='$ci_p'";
   	$res=$conn->query($query);

   	if (mysqli_num_rows($res) > 0) {
   		header("Location: formulario.php");
   		$continuar=0;
   		$_SESSION['existe']=1;
   }
   
   if ($continuar==1)
   {
		$query="	INSERT INTO profesor   
								(ci_p,   
								nom_p,   
								es_p,   
								activo) 
					VALUES 		('$ci_p',
								'$nom_p',
								'$es_p',
								'$activo')
				";
		
		$res=$conn->query($query);
		$_SESSION['existe']=1;

		if($res) {
			header("Location: tabla.php");
		}
		else {
			echo "Insercion no exitosa";
		}
	}
?>
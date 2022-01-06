<?php
session_start();
error_reporting(0);
$_SESSION['existe']=0;
?>
<?php
	include ("conexion.php");
	$conn=conectar();
	$continuar=1;
	$escuela    	= $_POST['escuela'];
	$descripcion	= $_POST['descripcion'];

	$query="SELECT * FROM escuela WHERE escuela='$escuela'";
   	$res=$conn->query($query);
   	if (mysqli_num_rows($res) > 0) {
   		header("Location: formulario.php");
   		$continuar=0;
   		$_SESSION['existe']=1;
   }
   if ($continuar==1){
   		$query="SELECT * FROM escuela WHERE descripcion='$descripcion'";
	   	$res=$conn->query($query);
	   	if (mysqli_num_rows($res) > 0) {
		   	$continuar=0;
		   	$_SESSION['existe']=1;
		   	header("Location: formulario.php");
	   }
	}
   if ($continuar==1)
   {

			
		$query="	INSERT INTO escuela   (escuela, descripcion) 
					VALUES  			('$escuela','$descripcion')
				";

		 $res=$conn->query($query);
		 $_SESSION['existe']=0;

		if($res) {
			header("Location: tabla.php");
		}
		else {
			echo "Insercion noooooo exitosa";
		}
	}
?>


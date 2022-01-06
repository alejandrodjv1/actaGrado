<?php
session_start();
error_reporting(0);
$_SESSION['existe']=0;
?>
<?php
	include ("conexion.php");
	$conn=conectar();

	$escuela     	= $_REQUEST['escuela'];
	$descripcion	= $_POST['descripcion'];

	$query="SELECT * FROM escuela WHERE escuela='$escuela'";
   	$res=$conn->query($query);
   	if (mysqli_num_rows($res) > 0) {
   		header("Location: tabla.php");
   		$continuar=0;
   		$_SESSION['existe']=1;
   }
   if ($continuar==1){
   		$query="SELECT * FROM escuela WHERE descripcion='$descripcion'";
	   	$res=$conn->query($query);
	   	if (mysqli_num_rows($res) > 0) {
		   	$continuar=0;
		   	$_SESSION['existe']=1;
		   	header("Location: tabla.php");
	   }
	}
   if ($continuar==1){
	
		$query="	UPDATE  escuela 
					SET 	descripcion	='$descripcion' 
					WHERE 	escuela		='$escuela' 
				";
		$res=$conn->query($query);

		if($res) {
			header("Location: tabla.php");
		}
		else {
			echo "Modificacion no exitosa";
		}
	}
?>
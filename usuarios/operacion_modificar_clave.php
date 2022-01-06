<?php
session_start();
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?>
<?php
	include ("conexion.php");
	$conn=conectar();

	$id 	  		= $_POST['id'];
	
	$usuario  		= $_POST['usuario'];
	$clave  		= $_POST['clave'];
	
	$query="	UPDATE  usuario
				SET 	
						usuario 		='$usuario',
						clave 			='$clave'
						
				WHERE 	id 				='$id'
			";
	$res=$conn->query($query);

	if($res) {
		header("Location: ../index.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
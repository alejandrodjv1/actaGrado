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
	
	$ced_usuario  	= $_POST['ced_usuario'];
	$nom_usuario  	= $_POST['nom_usuario'];
	$rol  			= $_POST['rol'];
	$usuario  		= $_POST['usuario'];
	$clave  		= $_POST['clave'];
	$resp_secreta	= $_POST['resp_secreta'];
	
	
	$query="	UPDATE  usuario
				SET 	ced_usuario		='$ced_usuario',
						nom_usuario 	='$nom_usuario',
						rol 			='$rol',
						usuario 		='$usuario',
						clave 			='$clave',
						resp_secreta 	='$resp_secreta'
					 	
				WHERE 	id 				='$id'
			";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Modificacion no exitosa";
	}
?>
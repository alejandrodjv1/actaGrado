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

	
	$ced_usuario  	= $_POST['ced_usuario'];
	$nom_usuario  	= $_POST['nom_usuario'];
	$rol  			= $_POST['rol'];
	$usuario  		= $_POST['usuario'];
	$clave  		= $_POST['clave'];
	$resp_secreta	= $_POST['resp_secreta'];

	
	$query="	INSERT INTO usuario (  ced_usuario,   nom_usuario,   rol,   usuario,   clave,   resp_secreta) 
				VALUES  			('$ced_usuario','$nom_usuario','$rol','$usuario','$clave', '$resp_secreta')
			";

	 $res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Insercion noooooo exitosa";
	}
?>


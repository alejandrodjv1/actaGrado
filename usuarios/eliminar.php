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

	$id = $_REQUEST['id'];
if($var_rol=='Administrador'){
	if($var_rol!='Usuario'){
		$query="DELETE  
			FROM usuario  
			WHERE id='$id'
			";
		$res=$conn->query($query);

		if($res) {
			header("Location: tabla.php");
		}
		else {
			echo "Borrado no exitoso";
		}
	}
}?>
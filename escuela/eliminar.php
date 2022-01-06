<?php
session_start();
error_reporting(0);
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?>
<?php
	include ("conexion.php");
	$conn=conectar();

	$escuela = $_REQUEST['escuela'];
if($var_rol=='Administrador'){
	$query="DELETE  
			FROM escuela  
			WHERE escuela=$escuela
			";
	$res=$conn->query($query);

	if($res) {
		header("Location: tabla.php");
	}
	else {
		echo "Borrado no exitoso";
	}
}
?>
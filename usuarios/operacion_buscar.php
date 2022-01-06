<<?php
session_start();
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<meta charset="utf-8">
   
     <link href="../css/estilos3.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <header>
        <div align="center">
            <table>
                <tr>
                    <td ><img src="../imagenes/L.png" alt="Logo" ></td>
                </tr>
            </table>
        </div>
    </header>
    <nav class="navegacion">
        <ul class="menu">
             <li><a href="../usuarios/index.php"     class="bla"> Inicio</a></li>
            <li><a href="../procedencia/tabla.php"  class="bla"> Procedencia</a></li>
            <li><a href="../monitor/tabla.php"      class="bla"> Monitores</a></li>
            <li><a href="../cpu/tabla.php"          class="bla"> Case</a></li>
            <li><a href="../laptop/tabla.php"       class="bla"> Laptop</a></li>
            <li><a href="../impresora/tabla.php"    class="bla"> Impresoras</a></li>
            <li><a href="../accesorio/tabla.php"    class="bla"> Accesorio</a></li>
            <li><a href="tabla.php"                 class="bla"> Seguridad</a></li>
            <li><a href="../salir/cerrar_sesion.php"class="bla"> Salir</a></li>
        </ul>
    </nav>

                    <?php
                        $id=$_REQUEST['id'];

                        include("conexion.php");
                        $conn=conectar();

                        $query="SELECT * 
                                FROM usuario
                                WHERE ced_usuario='$id'
                                ";
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

	<center>
		<section class="row">
                <article >
                    <h1>Datos de la Oficina</h1>
                    <table  align="center" border="3" class="caja2">
                        <form >
                             <tr>
                                <td><label>Cedula:</label></td>
                                <td><input type="text" REQUIRED name="ced_usuario" placeholder=""
                                        value="<?php echo $row['ced_usuario'];?>" autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                        minlength="10" maxlength="10" required pattern="" 
                                        title="solo Letras y numeros con guion. mínimo: 3 letras. máximo: 20 letras"/>
                                    
                                </td>
                            </tr>
                           
                           <tr>
                                <td><label>Usuario:</label></td>
                                <td><input type="text" REQUIRED name="usuario" placeholder=""
                                    value="<?php echo $row['usuario'];?>"   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                     minlength="4" maxlength="13" title=""/>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Clave:</label></td>
                                <td><input type="text" REQUIRED name="clave" placeholder=""
                                    value="<?php echo $row['clave'];?>"   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                     minlength="10" maxlength="10" title=""/>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Nombre:</label></td>
                                <td><input type="text" REQUIRED name="nom_usuario" placeholder=""
                                    value="<?php echo $row['nom_usuario'];?>"   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                     minlength="4" maxlength="20" title=""/>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Rol:</label></td>
                                <td><input type="text" REQUIRED name="rol" placeholder=""
                                    value="<?php echo $row['rol'];?>"   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                     minlength="1" maxlength="1" title=""/>
                                </td>
                           
                            </tr>
                            
                            
                            <td ><a href="modificar.php?id=<?php echo $row['id'];?>">Modificar</a></td>
                            <td ><a href="eliminar.php?id=<?php  echo $row['id'];?>">Eliminar</a>
                                <a href="tabla.php">Regresar</a></td>
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
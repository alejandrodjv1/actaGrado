<?php
session_start();
error_reporting(0);
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?>
<DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<meta charset="utf-8">
   
     <link href="../css/estilos3.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
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
            <li><a href="tabla.php"                 class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
            <li><a                                  class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="../acta/tabla.php"         class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
             <li><a href="../usuarios/tabla.php"                 class="bla"> Seguridad</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
        </nav>

	<center>
		<section class="row">
                <article >
                    <h1>Datos de la Escuela</h1>

                    <table  align="center" border="3" class="caja2">
                        <form action="operacion_guardar.php" method="POST">
                            <tr>
                                <tr><td><label>Escuela :</label></td>
                                    <td><input type="text" REQUIRED name="escuela" placeholder="solo numeros..." value="" 
                                    minlength="2" maxlength="2" required pattern="[0-9]+" autocomplete="off"
                                    title="solo numeros. mínimo: 2 digitos. máximo: 2 digitos" autofocus /><br></td>
                                </tr>
                                <tr>
                                    <td><label>NOMBRE:</label></td>
                                    <td><input type="text" REQUIRED name="descripcion" placeholder="solo letras..."value="" 
                                    minlength="5" maxlength="40" required pattern="[A-Za-z,""]*" autocomplete="off"
                                    title="solo Letras. mínimo: 5 letras. máximo: 40 letras" autocomplete="off"/><br></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                                    <td><a href="tabla.php">Regresar</a></td>
                                </tr>
                        </form>
                        <?php if ($_SESSION['existe']==1) {
                                    echo '<html><body style="background-image:url(../imagenes/paredrocas.jpg);"><center><h1 style="background-color:blue;color:white;">Nombre de la Escuela Existe</h1></center></body></html>';
                                    $_SESSION['existe']=0;
                        }?>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
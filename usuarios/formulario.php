<?php
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
           <li><a href="../escuela/tabla.php"                 class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
            <li><a href="../jurado_1/tabla.php"                 class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="../acta/tabla.php"         class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
             <li><a href="tabla.php"                 class="bla"> Seguridad</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
        </nav>

	<center>
        <section class="row">
                <article >
                    <h1>Datos de Usuario</h1>

                    <table  align="center" border="3" class="caja2">
                        <form action="operacion_guardar.php" method="POST">
                            
                            
                            <tr>
                                <td><label>Cedula:</label></td>
                                <td><input type="text" REQUIRED name="ced_usuario" placeholder=" V-12345678" autofocus
                                        value="" autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                        minlength="7" maxlength="10" required pattern="" 
                                        title="solo Letras y numeros con guion. mínimo: 7 letras. máximo: 10 letras"/>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td><label>Nombre Completo:</label></td>
                                <td><input type="text" REQUIRED name="nom_usuario" placeholder="Nombre Completo"
                                    value=""   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                     minlength="4" maxlength="20" title=""/>
                                </td>
                            </tr>
                            <tr>
                                <tr><td><label>Rol:</label></td>
                                    <td><input type="text" REQUIRED name="rol" placeholder="Administrador/Usuario"
                                        minlength="7" maxlength="13" required pattern="(Administrador|Usuario)"
                                        title="Administrador o Usuario..." list="rol"/>
                                    <datalist id="rol">
                                        <option value="Administrador">   </option>
                                        <option value="Usuario">         </option>
                                    </datalist><br/>
                                    </td>
                                </tr>
                            </tr>
                           
                           <tr>
                                <td><label>Usuario:</label></td>
                                <td><input type="text" REQUIRED name="usuario" placeholder="Usuario"
                                    value=""   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                     minlength="3" maxlength="13" title=""/>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Clave:</label></td>
                                <td><input type="text" REQUIRED name="clave" placeholder="Clave"
                                    value=""   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,/,*,""]*"
                                     minlength="4" maxlength="10" title=""/>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Pregunta de Seguridad<br>Color Favorito:??</label></td>
                                <td><input type="text" REQUIRED name="resp_secreta" placeholder="Respuesta Secreta"
                                    value=""   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                     minlength="3" maxlength="20" title=""/>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                                <td><a href="tabla.php">Regresar</a></td>
                            </tr>
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
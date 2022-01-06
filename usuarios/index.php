<?php
    session_start();
    error_reporting(0);
    if(isset($_SESSION['rol'])){
       echo 'Sesion  de   '.$_SESSION['nombre'];}
    else{
        echo 'no tienes session';}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Usuario/index.php</title>
        <title>Formulario</title>
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
            <li><a                                  class="bla"> Jurado</a>
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
            <article>
              <tr> <img src="../imagenes/bienvenido.jpg" alt="Logo" width="700px"></td>
            </article>
        </center>
       
    </body>

    
</html>

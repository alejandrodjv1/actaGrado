<?php
session_start();
error_reporting(0);
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?><!DOCTYPE html>
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
                    <td><img src="../imagenes/L.png" alt="Logo" width="700px"></td>
                </tr>
            </table>
        </div>
    </header>
    <ul class="menu">
            <li><a href="../escuela/tabla.php"      class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="tabla.php"                 class="bla"> Tesis</a></li>
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
                    <h1>Agregar<br> Tutor Metodologico a la Tesis..???</h1>
                    <?php

                        include("conexion.php");
                        $conn=conectar();
                        $ci_a     =$_REQUEST['ced_tesis'];
                        $id_tu_acad     =$_REQUEST['id_tu_acad'];
                        $ced_tutor_acad     =$_REQUEST['ced_tutor_acad'];
                        $id_tesis_te        =$_REQUEST['id_tesis_te'];
                        $escuela            =$_REQUEST['escuela'];

                       $query="SELECT *
                                FROM tutor_acad AS tu_acad
                                INNER JOIN profesor AS pr
                                ON tu_acad.ced_tutor_acad=pr.ci_p
                                INNER JOIN escuela AS es
                                ON pr.es_p=es.escuela
                                WHERE pr.activo=1
                               AND tu_acad.id_tu_acad=$id_tu_acad
                                AND pr.estatus_tu_acad_pr=1
                                            
                                    
                               
                                ";
                                
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_agregar_acad.php" method="POST">
                            
                            <tr>
                                <td><label bgcolor="orange">Id Tesis:</label></td>
                                <td><input type="text" name="id_tesis_te" placeholder="" 
                                    value="<?php echo $id_tesis_te;?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Cedula Autor:</label></td>
                                <td><input type="text" name="ci_a" placeholder="" 
                                    value="<?php echo $ci_a;?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Id Tutor Academico:</label></td>
                                <td><input type="text" name="id_tu_acad" placeholder="" 
                                    value="<?php echo $row['id_tu_acad'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Cedula:</label></td>
                               <td><input type="text" name="ced_tutor_acad" placeholder=" " 
                                    value="<?php echo $ced_tutor_acad;?>" minlength="7" maxlength="10" required pattern="[0-9,.]+"
                                    title="solo números. Tamaño mínimo: 7. Tamaño máximo: 10"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombres<br>Apellidos:</label></td>
                                <td><input type="text" name="nom_tutor_acad" placeholder="" 
                                    value="<?php echo $row['nom_tutor_acad'];?>"/><br></td>
                            </tr>
                            
                            <tr><td><label>Escuela :</label></td>
                               <td>
                                    <input type="text" name="es_tu_acad" placeholder=" "
                                    value="<?php echo $row['es_tu_acad'];?>"/>
                               </td>
                            </tr>
                            <td ><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="formulario_2.php">Regresar</a></td></tr>
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
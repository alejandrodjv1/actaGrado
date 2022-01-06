<!DOCTYPE html>
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
    <nav class="navegacion">
        <ul class="menu">
            <li><a href="../index.html"             class="bla"> Inicio</a></li>
            <li><a href="..escuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="tabla.php"        class="bla"> Tesis</a></li>
            <li><a href="../jurado_1/tabla.php"                 class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="../acta/tabla.php"         class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../index.html"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
		<section class="row">
                <article >
                    <h1>Seguro de Agregar Profesor...???</h1>
                    <?php

                        include("conexion.php");
                        $conn=conectar();
                        $ced_tesis     =$_GET['ced_tesis'];
                        $id_tesis_te=$_GET['id_tesis_te'];
                        $id_tu_acad     =$_GET['id_tu_acad'];

                        $query="SELECT  
                                tu_acad.id_tu_acad,tu_acad.ced_tutor_acad,tu_acad.nom_tutor_acad,
                                pr.id_p,pr.activo,pr.ci_p,pr.es_p,pr.estatus_tu_acad_pr,pr.nom_p,
                                es.descripcion, es.escuela
                                FROM tutor_acad AS tu_acad
                                INNER JOIN profesor AS pr
                                ON tu_acad.ced_tutor_acad=pr.ci_p
                                INNER JOIN escuela AS es
                                ON pr.es_p=es.escuela
                                WHERE pr.activo=1
                                AND pr.estatus_tu_acad_pr=1
                               
                                ";
                        $res=$conn->query($query);
                        while($row=$res->fetch_assoc()){
                            if($id_tu_acad==$row['id_tu_acad']){?>
                           

                                <table align="center" border="2px" class="caja2">
                                    <form action="operacion_agregar_acad_mod.php" method="POST">
                                        <tr>
                                            <td><label bgcolor="orange">Id Tesis:</label></td>
                                            <td><input type="text" name="id_tesis_te" placeholder="<?php echo $id_tesis_te;?>" 
                                                        value="<?php echo $id_tesis_te;?>"><br></td>
                                        </tr>
                                        <tr>
                                            <td><label bgcolor="orange">Cedula Autor:</label></td>
                                            <td><input type="text" name="ced_tesis" placeholder="" 
                                                        value="<?php echo $ced_tesis;?>"><br></td>
                                        </tr>
                                        <tr>
                                            <td><label bgcolor="orange">Id Tutor Academico:</label></td>
                                            <td><input type="text" name="id_tu_acad" placeholder="" 
                                                        value="<?php echo $id_tu_acad;?>"><br></td>
                                        </tr>
                                        <tr>
                                            <td><label bgcolor="orange">Cedula:</label></td>
                                            <td><input type="text" name="ci_p" placeholder=" " 
                                                        value="<?php echo $row['ced_tutor_acad'];?>"><br></td>
                                        </tr>
                                        <tr>
                                            <td><label>Nombres<br>Apellidos:</label></td>
                                            <td><input type="text" name="nom_p" placeholder="" 
                                                        value="<?php echo $row['nom_p'];?>"/><br></td>
                                        </tr>
                                        <tr>
                                            <td><label>Escuela :</label></td>
                                            <td><input type="text" name="descripcion" placeholder=" "
                                                        value="<?php echo utf8_encode($row['descripcion']);?>"/></td>
                                        </tr>
                                                
                                            <td ><input type="submit" name="Aceptar" value="Aceptar"></td>
                                            <td><a href="modificar.php">Regresar</a></td></tr>
                                    </form>
                                </table><?php
                            }
                        }?>

                </article>
        </section>
		
	</center>
</body>
</html>
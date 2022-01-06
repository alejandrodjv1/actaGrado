<!DOCTYPE html>
<html>
<head>
	<title>Formulario Modificar</title>
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
            <li><a href="../sescuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="tabla.php"                 class="bla"> Tesis</a></li>
            <li><a href="../jurado_1/tabla.php"                  class="bla"> Jurado</a>
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
                    <h1>Datos<br> de las Tesis</h1>
                     <?php

                        include("conexion.php");
                        $id_tesis=$_REQUEST['id_tesis_te'];
                        $query="SELECT  al.ci_a,al.nom_a,al.mat_pend,al.nota_proy,
                                es.descripcion, es.escuela,
                                tu_met.id_tu_met,tu_met.ced_tutor_met,tu_met.nom_tutor_met,
                                tu_acad.id_tu_acad,tu_acad.ced_tutor_acad,tu_acad.nom_tutor_acad,
                                te.id_te,te.id_tesis_te,te.ced_tesis,te.nom_tesis,te.es_tesis,te.titulo_tesis,
                                te.id_jurado_1,te.id_jurado_2,te.id_jurado_3,te.id_fecha_te,te.id_tutor_met,te.id_tutor_acad,                               
                                pr.activo,pr.ci_p,pr.es_p,pr.estatus_tu_met_pr,
                                ju1.id_tesis_jurado_1,ju1.ci_jur_1,ju1.nom_ju_1,
                                ju2.id_tesis_jurado_2,ju2.ci_jur_2,ju2.nom_ju_2,
                                ju3.id_tesis_jurado_3,ju3.ci_jur_3,ju3.nom_ju_3,
                                pr.activo,pr.ci_p,pr.nom_p,pr.es_p,pr.estatus_tu_acad_pr,
                                fe.id_fecha, fe.fecha_pre,fe.hora_pre,fe.fecha_def,fe.hora_def,
                                fe.semestre,fe.ao,fe.estatus_fecha_tesis
                        FROM tesis AS te
                        INNER JOIN alumno AS al
                        ON te.ced_tesis=al.ci_a
                        INNER JOIN  tutor_met AS tu_met
                        ON te.id_tutor_met=tu_met.id_tu_met
                        INNER JOIN  tutor_acad AS tu_acad
                        ON te.id_tutor_acad=tu_acad.id_tu_acad
                        INNER JOIN profesor AS pr
                        ON tu_met.ced_tutor_met=pr.ci_p
                        
                        INNER JOIN jurado_1 AS ju1
                        ON te.id_jurado_1=ju1.id_jurado_1
                        INNER JOIN jurado_2 AS ju2
                        ON te.id_jurado_2=ju2.id_jurado_2
                        INNER JOIN jurado_3 AS ju3
                        ON te.id_jurado_3=ju3.id_jurado_3
                        INNER JOIN fecha AS fe
                        ON te.id_fecha_te=fe.id_fecha
                        INNER JOIN escuela AS es
                        ON al.es_a=es.escuela
                        WHERE te.id_tesis_te=$id_tesis
                        ORDER BY te.id_tesis_te ASC
                        ";
                       
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc()?>

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_modificar.php" method="POST">
                            <tr>
                                <td><label>Codigo de Tesis:</label></td>
                                <td><input type="text" REQUIRED name="id_tesis_te" placeholder="" 
                                    value="<?php echo $row['id_tesis_te'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Titulo :</label></td>
                                <td><input type="text" REQUIRED name="titulo_tesis" placeholder="" 
                                    value="<?php echo $row['titulo_tesis'];?>"/><br/></td>
                            </tr>
                            <tr>
                                <td><label>Autor:</label></td>
                                <td><input type="text" REQUIRED name="ced_tesis" placeholder="" 
                                    value="<?php echo $row['ced_tesis'];?>"/><br>
                                    <input type="text" REQUIRED name="nom_tesis" placeholder="" 
                                    value="<?php echo $row['nom_tesis'];?>"/><br></td>
                                    <td><a href="formulario_1.php?id_tesis_te=<?php echo $row['id_tesis_te'];?>">Modificar</a></td>
                            </tr>
                            
                            
                            <tr>
                                <td><label>ASESOR<br> METODOLOGICO:  </td>
                                <td><input type="text" REQUIRED name="ced_tutor_met" placeholder="" 
                                    value="<?php echo $row['ced_tutor_met'];?>"/><br>
                                    <input type="text" REQUIRED name="nom_tutor_met" placeholder="" 
                                    value="<?php echo $row['nom_tutor_met'];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>TUTOR <br> ACADEMICO:  </td>
                               <td><input type="text" REQUIRED name="ced_tutor_acad" placeholder="" 
                                    value="<?php echo $row['ced_tutor_acad'];?>"/><br>
                                    <input type="text" REQUIRED name="nom_tutor_acad" placeholder="" 
                                    value="<?php echo $row['nom_tutor_acad'];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>PRIMER<br> JURADO:  </td>
                                <td><input type="text" REQUIRED name="ci_jur_1" placeholder="" 
                                    value="<?php echo "V- ".$row['ci_jur_1' ];?>"/><br>
                                    <input type="text" REQUIRED name="nom_jur_1" placeholder="" 
                                    value="<?php echo $row['nom_ju_1' ];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>SEGUNDO<br> JURADO:  </td>
                                <td><input type="text" REQUIRED name="ci_jur_2" placeholder="" 
                                    value="<?php echo "V- ".$row['ci_jur_2' ];?>"/><br>
                                    <input type="text" REQUIRED name="nom_jur_2" placeholder="" 
                                    value="<?php echo $row['nom_ju_2' ];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>TERCER<br> JURADO:  </td>
                                <td><input type="text" REQUIRED name="ci_jur_3" placeholder="" 
                                    value="<?php echo "V- ".$row['ci_jur_3' ];?>"/><br>
                                    <input type="text" REQUIRED name="nom_jur_3" placeholder="" 
                                    value="<?php echo $row['nom_ju_3' ];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>FECHA<br> PREDEFENSA:  </td>
                                <td><input type="text" REQUIRED name="fecha_pre" placeholder="" 
                                    value="<?php echo $row['fecha_pre'];?>"/><br>
                                    <input type="text" REQUIRED name="hora_pre" placeholder="" 
                                    value="<?php echo $row['hora_pre'];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>FECHA<br> DEFENSA:  </td>
                               <td><input type="text" REQUIRED name="fecha_def" placeholder="" 
                                    value="<?php echo $row['fecha_def'];?>"/><br>
                                    <input type="text" REQUIRED name="hora_def" placeholder="" 
                                    value="<?php echo $row['hora_def'];?>"/><br></td>
                            </tr>
                             
                           
                            <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>
                            
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
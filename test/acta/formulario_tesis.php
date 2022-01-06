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
                    <td><img src="../imagenes/L.png" alt="Logo" width="700px"></td>
                </tr>
            </table>
        </div>
    </header>
    <nav class="navegacion">
        <ul class="menu">
            <li><a href="../index.html"             class="bla"> Inicio</a></li>
            <li><a href="../escuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
           <li><a href="../jurado_1/tabla.php"      class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="tabla.php"                 class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../index.html"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
        <article ><br>
        <table  align="center" border="3" class="caja2">
            <thead>
                <tr>
                    <th colspan="1"></th>
                    <th colspan="9"><h1>Listado de Tesis</h1></th>
                    <td colspan="3"><a href="tabla.php">Regresar</a></td>
                </tr>
            </thead>
            <tbody>
                 <tr>
                    <td colspan="1"  bgcolor="orange">ID</td>
                    <td colspan="1"  bgcolor="orange">AUTOR</td>
                    <td colspan="2"  bgcolor="orange">COD.<br>ESC.</td>
                    <td colspan="2"  bgcolor="orange">ESCUELA </td>
                    <td colspan="2"  bgcolor="orange">TUTOR<BR>METODOLOGICO</td>
                     <td colspan="2"  bgcolor="orange">ASESOR<br>ACADEMICO</td>
                    <td colspan="1"  bgcolor="orange">OPERACIONES  </td>
                </tr>
                
                
                <?php       
                include("conexion.php");
                $query="SELECT  *
                               
                        FROM tesis AS te
                        INNER JOIN alumno AS al
                        ON te.ced_tesis=al.ci_a
                        INNER JOIN  tutor_met AS tu_met
                        ON te.id_tutor_met=tu_met.id_tu_met
                        INNER JOIN  tutor_acad AS tu_acad
                        ON te.id_tutor_acad=tu_acad.id_tu_acad
                        INNER JOIN profesor AS pr
                        ON tu_met.ced_tutor_met=pr.ci_p
                        
                        INNER JOIN escuela AS es
                        ON al.es_a=es.escuela
                        WHERE al.estatus_tesis=1
                        AND al.estatus_acta=0
                         
                        ORDER BY te.id_tesis_te ASC
                        ";  
                        
                            

                $res=$conn->query($query);
                while($row=$res->fetch_assoc()){?>
                    <tr>
                    <td rowspan="2"class="letra"><?php echo $row['id_tesis_te'];?></td>
                    <td><?php echo "V- ".$row['ci_a'];?><br><?php echo $row['nom_a'];?></td>
                    <td colspan="2"><?php echo $row['es_a'];?></td>
                    <td colspan="2"><?php echo utf8_encode($row['descripcion']);?></td>
                    <td colspan="2"><?php echo "V- ".$row['ced_tutor_met' ]?><br><?php echo $row['nom_tutor_met' ];?></td>
                    <td colspan="2"><?php echo "V- ".$row['ced_tutor_acad' ]?><br><?php echo $row['nom_tutor_acad' ];?></td>
                   

                    <td colspan="3"><a href="operacion_agregar_acta.php?id_tesis_te=<?php echo $row['id_tesis_te'];?>&ci_a=<?php echo $row['ci_a'];?>&escuela=<?php echo $row['escuela'];?>&ced_tutor_acad=<?php echo $row['ced_tutor_acad'];?>">Agregar</a></td>
                    </tr>
                   <tr>
                    <td  bgcolor="orange" class="letra">TITULO: </td>
                    <td colspan="9"><?php echo $row['titulo_tesis'];?></td>
                    </tr>
                    <td colspan="11" bgcolor="black"></td>
                <?php
                }?>

            </tbody>
        </table>
        </article>
    </center>
</body>
</html>
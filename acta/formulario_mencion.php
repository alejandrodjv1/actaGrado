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
        <nav class="navegacion">
           <nav class="navegacion">
        <ul class="menu">
           <li><a href="../escuela/tabla.php"       class="bla"> Escuela</a></li>
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
            <li><a href="../usuarios/tabla.php"      class="bla"> Seguridad</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
       
            <article >
                <h1> Agregar tesis...???</h1><?php
                $id_tesis_te=$_REQUEST['id_tesis_te'];    
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
                        AND tu_met.es_tu_met=pr.es_p
                        
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
                        INNER JOIN escuela AS es1
                        ON pr.es_p=es1.escuela
                        WHERE al.estatus_tesis=1
                        AND al.estatus_acta=0
                         
                        ORDER BY te.id_tesis_te ASC
                        ";
                $res=$conn->query($query);
                $row=$res->fetch_assoc()?>        
                <table align="center" border="2px" class="caja2">
                    <form action="operacion_agregar_acta.php" method="POST">
                    <tr>
                            <?php $ac = array($row['escuela'],$row['ao'],$row['semestre'],$row['id_tesis_te']);
                                $acta  = implode("",$ac );?>
                        <td bgcolor="orange"><label>A C T A:<br>N°: <?php echo $acta;?></label></td>
                        <input type="hidden"  name="<?php echo $row['es_tesis'];?>" placeholder="" 
                                            value="<?php echo $row['es_tesis'];?>">
                        
                        <input type="hidden"  name="<?php echo $row['ao'];?>" placeholder="" 
                                            value="<?php echo $row['ao'];?>">
                        
                        <input type="hidden"  name="<?php echo $row['semestre'];?>" placeholder="" 
                                            value="<?php echo $row['semestre'];?>">
                        
                        <input type="hidden"  name="id_tesis_te" placeholder="" 
                                            value="<?php echo $row['id_tesis_te'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Autor:<br>
                        Cedula:<input type="text"  name="ci_a" placeholder="" 
                                            value="<?php echo $row['ci_a'];?>"><br>
                        
                        Nombre:<input type="text"  name="<?php echo $row['nom_a'];?>" placeholder="" 
                                            value="<?php echo $row['nom_a'];?>"><br>
                        
                        <input type="hidden"  name="<?php echo $row['es_a'];?>" placeholder="" 
                                            value="<?php echo $row['es_a'];?>">
                        
                        
                        Escuela:<input type="text"  name="<?php echo $descripcion;?>" placeholder="" 
                                            value="<?php echo utf8_encode($row['descripcion']);?>"></label></td>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Asesor Metodologico: <?php echo $row['id_tu_met'];?><br>
                        Cedula:<input type="text"  name="<?php echo $row['ced_tutor_met'];?>" placeholder="" 
                                            value="<?php echo $row['ced_tutor_met'];?>"><br>
                        
                        Nombre:<input type="text"  name="<?php echo $row['nom_tutor_met'];?>" placeholder="" 
                                            value="<?php echo $row['nom_tutor_met'];?>"><br>
                        
                        <input type="hidden"  name="<?php echo $row['es_tu_met'];?>" placeholder="" 
                                            value="<?php echo $row['es_tu_met'];?>">
                       
                        Escuela:<input type="text"  name="<?php echo utf8_encode($row['descripcion']);?>" placeholder="" 
                                            value="<?php echo utf8_encode($row['descripcion']);?>"></label></td>
                        </td>
                    </tr>
                                                    
                            <td><a href="formulario_tesis.php">Regresar</a>
                            <input type="submit" name="Aceptar" value="Aceptar"></tr></td>
                        </form>
                </table>
            </article>
       
	<center>
</body>
</html>
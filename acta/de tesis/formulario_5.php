<?php?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulario Agregar</title>
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
            <li><a href="tabla.php"                 class="bla"> Tesis</a></li>
            <li><a href="../jurado/tabla.php"       class="bla"> Jurado</a></li>
            <li><a href="../acta/tabla.php"         class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../index.html"             class="bla">Salir</a></li>
        </ul>
    </nav>

	
    <center>
        <article ><br>
        <table  align="center" border="3" class="caja2">
            <thead>
                <tr>
                    <th colspan="2"></th>
                    <th colspan="9"><h1>Elegir un profesor para<br>Tercer Jurado</h1></th>
                    <td colspan="3"><a href="tabla.php">Regresar</a></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="1"  bgcolor="orange">ID<br>PROFESOR</td>
                    <td colspan="1"  bgcolor="orange">CEDULA </td>
                    <td colspan="2"  bgcolor="orange">NOMBRES<br>APELLIDOS </td>
                    <td colspan="2"  bgcolor="orange">COD.<br>ESC.</td>
                    <td colspan="2"  bgcolor="orange">ESCUELA </td>
                    <td colspan="2"  bgcolor="orange">ESTATUS  </td>
                    
                    <td colspan="4"  bgcolor="orange">OPERACIONES  </td>
                </tr>
                <?php
                
                            include("conexion.php");
                                    
                            $query="SELECT  
                                ju2.id_ju_2,ju2.id_jurado_2,ju2.ci_jur_2,ju2.nom_ju_2,ju2.es_jurado_2,ju2.id_tesis_jurado_2,
                                te.id_te,te.id_tesis_te,te.ced_tesis,te.nom_tesis,te.es_tesis,te.titulo_tesis,
                                te.id_jurado_1,te.id_jurado_2,te.id_jurado_3,te.id_fecha_te,
                                te.id_tutor_met,te.id_menc,te.estatus_acta,
                                                                
                                pr.id_p,pr.activo,pr.ci_p,pr.es_p,pr.estatus_tu_met_pr,pr.nom_p,
                                            es.descripcion, es.escuela
                                    FROM tesis AS te
                                    INNER JOIN  jurado_2 AS ju2
                                    ON te.id_jurado_2!=ju2.id_jurado_2
                                    INNER JOIN profesor AS pr
                                    ON ju2.ci_jur_2=pr.ci_p
                                    INNER JOIN escuela AS es
                                    ON pr.es_p=es.escuela
                                    WHERE pr.activo=1
                                   AND pr.estatus_jurado_1=1
                                    AND te.id_tutor_acad!=0
                                    AND te.id_jurado_1!=te.id_tutor_acad
                                    AND te.id_jurado_2!=te.id_tutor_acad
                                    AND te.id_jurado_3!=te.id_tutor_acad
                                   
                                                                       
                                    ORDER BY id_p ASC
                                    ";
                            $res=$conn->query($query);
                            while($row=$res->fetch_assoc()){
                        ?>

                                <tr>
                                    <td colspan="1"><?php echo $row['id_p'   ];?></td>
                                    <td colspan="1"><?php echo $row['ci_p'   ];?></td>
                                    <td colspan="2"><?php echo $row['nom_p' ];?></td>
                                    <td colspan="2"><?php echo $row['escuela'];?></td>
                                    <td colspan="2"><?php echo utf8_encode($row['descripcion']);?></td>
                                    <?php if($row['activo']==1)$activo="Activo";
                                            elseif($row['activo']==0)$activo="Inactivo";?>
                                    <td colspan="2"><?php echo $activo;?></td>
                                    
                                    <td colspan="3"><a href="agregar_5.php?ci_p=<?php echo $row['ci_p'];?>">Agregar</a></td>
                                </tr>

                        <?php
                            }?>

            </tbody>
        </table>
        </article>
    </center>
</body>
</html>
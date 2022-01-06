<?php
$id_acta        =$_GET['id_acta'];
$id_tesis_te    =$_GET['id_tesis_te'];
$escuela        =$_GET['escuela'];
$ced_tutor_acad =$_GET['ced_tutor_acad'];
?>
<DOCTYPE html>
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
        <article ><br>
        <table  align="center" border="3" class="caja2">
            <thead>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="8"><h1>Listado de Jurado 2</h1></td>
                    <td colspan="1">
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
               <tr>
                    <td colspan="1"  bgcolor="orange">ID</td>
                    <td colspan="1"  bgcolor="orange">CEDULA</td>
                    <td colspan="2"  bgcolor="orange">NOMBRE</td>
                    <td colspan="2"  bgcolor="orange">COD.<br>ESC.</td>
                    <td colspan="2"  bgcolor="orange">ESCUELA </td>
                     <td colspan="2"  bgcolor="orange">ESTATUS  </td>
                    <td colspan="1"  bgcolor="orange">OPERACIONES  </td>
                </tr>
                </tr>
                <?php
                    include("conexion.php");
                   //$query="SELECT  id_tutor_acad FROM tesis WHERE id_tesis_te=$id_tesis_te";
                    //$res=$conn->query($query);$row=$res->fetch_assoc();$id_tutor_acad=$row['id_tutor_acad'];
                    //$query="SELECT  ced_tutor_acad FROM tutor_acad WHERE id_tu_acad=$id_tutor_acad";
                    //$res=$conn->query($query);$row=$res->fetch_assoc();$ced_tutor_acad=$row['ced_tutor_acad'];
                    
                    $query="SELECT  ju2.id_jurado_2,ju2.ci_jur_2,ju2.nom_ju_2,ju2.es_jurado_2,ju2.id_tesis_jurado_2,
                                    pr4.ci_p,pr4.es_p,pr4.nom_p,pr4.activo,
                                    pr4.estatus_tu_met_pr,pr4.estatus_tu_acad_pr,
                                    es.escuela,es.descripcion,pr4.estatus_jurado_2
                                    
                            FROM    jurado_2 AS ju2
                            INNER JOIN profesor AS pr4 
                            ON ju2.ci_jur_2=pr4.ci_p
                            INNER JOIN escuela AS es 
                            ON pr4.es_p=es.escuela
                           
                            WHERE estatus_jurado_2=1
                             AND ju2.es_jurado_2=$escuela
                            ORDER BY id_jurado_2 ASC
                            ";
                    $res=$conn->query($query);
                    while($row=$res->fetch_assoc()){
                ?> 
                        <tr>
                                    <td colspan="1"><?php echo $row['id_jurado_2'   ];?></td>
                                    <td colspan="1"><?php echo $row['ci_jur_2'   ];?></td>
                                    <td colspan="2"><?php echo $row['nom_ju_2' ];?></td>
                                    <td colspan="2"><?php echo $row['es_jurado_2'];?></td>
                                    <td colspan="2"><?php echo utf8_encode($row['descripcion']);?></td>
                                    <?php if($row['activo']==1)$activo="Activo";
                                            elseif($row['activo']==0)$activo="Inactivo";?>
                                    <td colspan="2"><?php echo $activo;?></td>
                            
                                    <td colspan="1"><a href="agregar_4_mod.php?id_acta=<?php echo $id_acta;?>&id_tesis_te=<?php echo $id_tesis_te;?>&id_jurado_2=<?php echo $row['id_jurado_2'];?>&ced_tutor_acad=<?php echo $ced_tutor_acad;?>&ced_tesis=<?php echo $ced_tesis;?>&escuela=<?php echo $escuela;?>">Agregar</a></td>
                            
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        </article>
    </center>
</body>
</html>
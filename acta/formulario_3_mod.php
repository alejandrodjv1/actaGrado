<?php
$id_acta        =$_GET['id_acta'];
$id_jurado_1    =$_GET['id_jurado_1'];
$ced_tutor_acad =$_GET['ced_tutor_acad'];
$escuela        =$_GET['escuela'];
$ced_tesis      =$_GET['ced_tesis'];






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
           
            <li><a href="../escuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="tabla.php"                 class="bla"> Tesis</a></li>
            <li><a                                   class="bla"> Jurado</a>
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
        <article ><br>
        <table  align="center" border="3" class="caja2">
            <thead>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="8"><h1>Listado de Jurado 1</h1></td>
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
                    
                    $query="SELECT  *                                    
                            FROM    jurado_1 AS ju1
                            INNER JOIN profesor AS pr4 
                            ON ju1.ci_jur_1=pr4.ci_p
                            INNER JOIN escuela AS es 
                            ON pr4.es_p=es.escuela
                           
                            WHERE  estatus_jurado_1=1
                           

                            
                            ORDER BY id_jurado_1 ASC
                            ";
                    $res=$conn->query($query);
                    while($row=$res->fetch_assoc()){
                ?> 
                        <tr>
                           <tr>
                                    <td colspan="1"><?php echo $row['id_jurado_1'   ];?></td>
                                    <td colspan="1"><?php echo $row['ci_jur_1'   ];?></td>
                                    <td colspan="2"><?php echo $row['nom_ju_1' ];?></td>
                                    <td colspan="2"><?php echo $row['es_jurado_1'];?></td>
                                    <td colspan="2"><?php echo utf8_encode($row['descripcion']);?></td>
                                    <?php if($row['activo']==1)$activo="Activo";
                                            elseif($row['activo']==0)$activo="Inactivo";?>
                                    <td colspan="2"><?php echo $activo;?></td>
                            
                                    <td colspan="3"><a href="agregar_3_mod.php?id_acta=<?php echo $id_acta;?>&id_jurado_1=<?php echo $id_jurado_1;?>&ced_tutor_acad=<?php echo $ced_tutor_acad;?>">Agregar</a></td>
                                               
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
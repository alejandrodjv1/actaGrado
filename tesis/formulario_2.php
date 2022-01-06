<?php
session_start();
error_reporting(0);
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?>
<?php
$escuela=$_REQUEST['escuela'];
$id_tesis_te =$_GET['id_tesis_te'];
$ced_tesis =$_GET['ci_a'];
?>
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
        <article ><br>
                <?php
                
                            include("conexion.php");
                                    
                            $query="SELECT * 
                                     FROM tutor_acad AS tu_acad
                                INNER JOIN profesor AS pr
                                ON tu_acad.ced_tutor_acad=pr.ci_p
                                INNER JOIN escuela AS es
                                ON pr.es_p=es.escuela
                                WHERE pr.activo=1
                                AND pr.estatus_tu_acad_pr=1
                                                                   
                                ORDER BY id_tu_acad ASC
                                ";
                                $res=$conn->query($query);
                                
                                                         
                            ?>
        <table  align="center" border="3" class="caja2">
            <thead>
                <tr>
                    <th colspan="2"> 
                        ID  Tesis;<input type="text" name="id_tesis_te" placeholder=" " 
                                                value="<?php echo $id_tesis_te;?>"/><br>
                        C.I. Autor:<input type="text" name="ced_tesis" placeholder=" " 
                                                value="<?php echo $ced_tesis;?>"/></td>
                    <th colspan="8"><h1>Listado de Profesores<br>para elegir tutor Academico</h1></th>
                    <td colspan="2"><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>">Regresar</a></td>
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
                            while($row=$res->fetch_assoc()){?>
                                <tr>
                                    <td colspan="1"><?php echo $row['id_tu_acad'   ];?></td>
                                    <td colspan="1"><?php echo $row['ced_tutor_acad'   ];?></td>
                                    <td colspan="2"><?php echo $row['nom_tutor_acad' ];?></td>
                                    <td colspan="2"><?php echo $row['esc_tu_acad'];?></td>
                                    <td colspan="2"><?php echo utf8_encode($row['descripcion']);?></td>
                                    <?php if($row['activo']==1)$activo="Activo";
                                            elseif($row['activo']==0)$activo="Inactivo";?>
                                    <td colspan="2"><?php echo $activo;?></td>
                                    
                                    <td rowspan="1"><a href="agregar_2.php?id_tesis_te=<?php echo $id_tesis_te;?>&ced_tutor_acad=<?php echo $row['ced_tutor_acad'];?>&ced_tesis=<?php echo $ced_tesis;?>&escuela=<?php echo $escuela;?>&id_tu_acad=<?php echo $row['id_tu_acad'];?>">Agregar</a></td>
                                </tr>

                        <?php
                            }?>

            </tbody>
        </table>
        </article>
    </center>
</body>
</html>
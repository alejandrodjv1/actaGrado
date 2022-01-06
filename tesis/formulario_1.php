<?php
session_start();
error_reporting(0);
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?>
<?php
$escuela=$_GET['escuela'];
$id_tesis_te =$_GET['id_tesis_te'];
$ci_a =$_GET['ci_a'];
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
           
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla"> Escuela</a></li>
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla"> Estudiante</a></li>
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla"> Profesor</a></li>
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla"> Asesor Metodologico</a></li>
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla"> Tutor Academico</a></li>
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla"> Fechas</a></li>
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla"> Tesis</a></li>
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla">Jurado 1</a></li>
                    <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla">Jurado 2</a></li>
                    <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla"> Acta</a></li>
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla"> Catalogo</a></li>
            <li><a href="eliminar.php?id_tesis_te=<?php echo $id_tesis_te;?>&ci_a=<?php echo $ci_a;?>" class="bla">Salir</a></li>
        </ul>
    </nav>

    
    <center>
        <article ><br>
                <?php
                            include("conexion.php");
                            
                            $query="SELECT  *
                                    FROM tutor_met AS tu_met
                                    INNER JOIN profesor AS pr
                                    ON tu_met.ced_tutor_met=pr.ci_p
                                    INNER JOIN escuela AS es
                                    ON pr.es_p=es.escuela

                                    WHERE pr.activo=1
                                    AND pr.estatus_tu_met_pr=1
                                   
                                   
                                    ORDER BY id_tu_met ASC
                                    ";
                            $res=$conn->query($query);
                        ?>
        <table  align="center" border="3" class="caja2">
            <thead>
                <tr>
                    <th colspan="2"> 
                        ID  Tesis;<input type="text" name="id_tesis_te" placeholder=" " 
                                                value="<?php echo $id_tesis_te;?>"/><br>
                        C.I. Autor:<input type="text" name="ci_a" placeholder=" " 
                                                value="<?php echo $ci_a;?>"/></td>
                    <th colspan="8"><h1>Listado de Profesores<br>para elegir tutor Metodologico</h1></th>
                    <td colspan="3"><a href="eliminar.php?id_tesis_te=<?php echo $row['id_tesis_te'];?>&ced_tesis=<?php echo $row['ced_tesis'];?>&id_fecha=<?php echo $row['id_fecha'];?>">Regresar</a><br>
                                    
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
                           <?php while($row=$res->fetch_assoc()){?>
                                    <td colspan="1"><?php echo $row['id_tu_met'   ];?></td>
                                    <td colspan="1"><?php echo $row['ced_tutor_met'   ];?></td>
                                    <td colspan="2"><?php echo $row['nom_tutor_met' ];?></td>
                                    <td colspan="2"><?php echo $row['esc_tu_met'];?></td>
                                    <td colspan="2"><?php echo utf8_encode($row['descripcion']);?></td>
                                    <?php if($row['activo']==1)$activo="Activo";
                                            elseif($row['activo']==0)$activo="Inactivo";?>
                                    <td colspan="2"><?php echo $activo;?></td>
                                    <td rowspan="1"><a href="agregar_1.php?id_tesis_te=<?php echo $id_tesis_te;?>&ced_tutor_met=<?php echo $row['ced_tutor_met'];?>&ci_a=<?php echo $ci_a;?>&escuela=<?php echo $escuela;?>">Agregar</a></td>
                                </tr>

                        <?php
                            }?>

            </tbody>
        </table>
        </article>
    </center>
</body>
</html>
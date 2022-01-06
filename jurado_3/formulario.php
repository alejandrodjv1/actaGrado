<?php
session_start();
error_reporting(0);
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?>
<?php?>
<DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<meta charset="utf-8">
   
    <link href="../css/estilos3.css" rel="stylesheet" type="text/css" />
    
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
           <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
            <li><a                                  class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="tabla.php" class="bla">Jurado 3</a></li>
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
                    <th colspan="2"></th>
                    <th colspan="9"><h1>Listado de Profesores</h1></th>
                    <td colspan="3"><a href="tabla.php">Regresar</a></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td colspan="1"  bgcolor="orange">CEDULA </td>
                    <td colspan="2"  bgcolor="orange">NOMBRES<br>APELLIDOS </td>
                    <td colspan="2"  bgcolor="orange">COD.<br>ESC.</td>
                    <td colspan="2"  bgcolor="orange">ESCUELA </td>
                    <td colspan="2"  bgcolor="orange">ESTATUS  </td>
                    
                    <td colspan="4"  bgcolor="orange">OPERACIONES  </td>
                </tr>
                <?php
                
                            include("conexion.php");
                                    
                            $query="SELECT  pr.id_p,pr.ci_p,pr.nom_p,pr.es_p,pr.activo,pr.estatus_tu_acad_pr,
                                            pr.estatus_jurado_1,pr.estatus_jurado_2,pr.estatus_jurado_3,
                                            es.descripcion, es.escuela
                                    FROM profesor AS pr
                                    
                                    INNER JOIN escuela AS es
                                    ON pr.es_p=es.escuela
                                    WHERE pr.activo=1
                                    AND pr.estatus_jurado_3=0
                                    AND pr.estatus_jurado_1=0
                                    AND pr.estatus_jurado_2=0
                                    AND pr.estatus_jurado_3=0
                                   
                                    ORDER BY pr.id_p ASC
                                    ";
                            $res=$conn->query($query);
                            while($row=$res->fetch_assoc()){
                        ?>

                                <tr>
                                   
                                    <td colspan="1"><?php echo $row['ci_p'   ];?></td>
                                    <td colspan="2"><?php echo $row['nom_p' ];?></td>
                                    <td colspan="2"><?php echo $row['escuela'];?></td>
                                    <td colspan="2"><?php echo utf8_encode($row['descripcion']);?></td>
                                    <?php if($row['activo']==1)$activo="Activo";
                                            elseif($row['activo']==0)$activo="Inactivo";?>
                                    <td colspan="2"><?php echo $activo;?></td>
                                    
                                    <td colspan="3"><a href="agregar.php?ci_p=<?php echo $row['ci_p'];?>">Agregar</a></td>
                                </tr>

                        <?php
                            }?>

            </tbody>
        </table>
        </article>
    </center>
</body>
</html>
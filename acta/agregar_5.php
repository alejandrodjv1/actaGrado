<?php
session_start();
error_reporting(0);
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?><DOCTYPE html>
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
            <li><a href="../usuarios/tabla.php"                 class="bla"> Seguridad</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
		<section class="row">
                <article >
                    <h1 >Seguro de Agregar<br> Tercer Jurado de la Tesis..???</h1>
                    <?php

                        include("conexion.php");
                        $conn=conectar();
                         $id_acta           =$_REQUEST['id_acta'];
                        $escuela            =$_REQUEST['escuela'];
                        $ced_tutor_acad     =$_REQUEST['ced_tutor_acad'];
                        $ced_tesis          =$_REQUEST['ced_tesis'];
                        $id_tesis_te        =$_REQUEST['id_tesis_te'];
                        $id_jurado_3        =$_REQUEST['id_jurado_3'];
                       
                        $query="SELECT *  FROM jurado_3 AS ju3
                                INNER JOIN profesor AS pr
                                ON ju3.ci_jur_3=pr.ci_p
                                INNER JOIN escuela AS es
                                ON pr.es_p=es.escuela
                                WHERE pr.activo=1
                                AND ju3.id_jurado_3=$id_jurado_3
                                AND pr.estatus_jurado_3=1
                                ORDER BY id_jurado_3 ASC
                                ";
                                
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();?>

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_agregar_jurado_3.php" method="POST">
                            
                           <tr>
                                <td><label bgcolor="orange">Id <br>Tesis:</label></td>
                                <td><input type="text" name="id_tesis_te" placeholder="" 
                                    value="<?php echo $id_tesis_te;?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Id <br>Cedula Autor:</label></td>
                                <td><input type="text" name="ced_tesis" placeholder=" solo numeros..." 
                                    value="<?php echo $ced_tesis;?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Id:</label></td>
                                <td><input type="text" name="id_jurado_3" placeholder="" 
                                    value="<?php echo $id_jurado_3;?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Cedula:</label></td>
                                <td><input type="text" name="ci_jur_3" placeholder="" 
                                    value="<?php echo "V- ".$row['ci_jur_3'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombres<br>Apellidos:</label></td>
                                <td><input type="text" name="nom_p" placeholder="<?php echo $row['nom_p'];?>" 
                                    value="<?php echo $row['nom_P'];?>"/><br></td>
                            </tr>
                            
                            <tr>
                                <td><label>Escuela :</label></td>
                                <td><input type="text" name="es_p" placeholder="<?php echo $row['es_p'];?>"
                                    value="<?php echo $row['es_p'];?>"/></td>
                            </tr>
                            <input type="hidden" name="escuela"     placeholder=" " value="<?php echo $escuela;?>"/>
                            <input type="hidden" name="id_acta"     placeholder=" " value="<?php echo $id_acta;?>"/>
                            <input type="hidden" name="ced_tutor_acad" placeholder=" " value="<?php echo $ced_tutor_acad;?>"/>
                            <input type="hidden" name="ced_tesis"   placeholder=" " value="<?php echo $ced_tesis;?>"/>
                            <input type="hidden" name="id_jurado_1" placeholder=" " value="<?php echo $id_jurado_1;?>"/>
                            
                            <td ><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="formulario_5.php?id_acta=<?php echo $id_acta;?>&id_tesis_te=<?php echo $id_tesis_te;?>&id_jurado_3=<?php echo $row['id_jurado_3'];?>&ced_tutor_acad=<?php echo $ced_tutor_acad;?>&ced_tesis=<?php echo $ced_tesis;?>&escuela=<?php echo $escuela;?>">Regresar</a></td></tr>

                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
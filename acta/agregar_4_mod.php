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
           <li><a href="../escuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
           <li><a                                   class="bla"> Jurado</a>
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
                    <h1>Datos Jurado 2 <h1>
                    <?php

                        include("conexion.php");
                        $conn=conectar();
                        $id_acta            =$_REQUEST['id_acta'];
                        $escuela            =$_REQUEST['escuela'];
                        $ced_tutor_acad     =$_REQUEST['ced_tutor_acad'];
                        //$ced_tesis          =$_REQUEST['ced_tesis'];
                        $id_tesis_te        =$_REQUEST['id_tesis_te'];
                        $id_jurado_2        =$_REQUEST['id_jurado_2'];

                       $query="SELECT  *
                                FROM jurado_2 AS ju2
                                INNER JOIN profesor AS pr
                                ON ju2.ci_jur_2=pr.ci_p
                                INNER JOIN escuela AS es
                                ON pr.es_p=es.escuela
                                WHERE pr.activo=1
                                AND ju2.id_jurado_2=$id_jurado_2
                                AND pr.estatus_jurado_2=1
                                ORDER BY id_jurado_2 ASC
                                ";
                                
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();?>

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_agregar_jurado_2_mod.php" method="POST">
                            
                           
                            <tr>
                                <td><label bgcolor="orange">Id:</label></td>
                                <td><input type="text" name="id_jurado_2" placeholder=" solo numeros..." 
                                    value="<?php echo $row['id_jurado_2'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Cedula:</label></td>
                                <td><input type="text" name="ci_jur_2" placeholder="" 
                                    value="<?php echo $row['ci_jur_2'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombres<br>Apellidos:</label></td>
                                <td><input type="text" name="nom_ju_2" placeholder="" 
                                    value="<?php echo $row['nom_ju_2'];?>"/><br></td>
                            </tr>
                            
                            <tr>
                                <td><label>Escuela :</label></td>
                                <td><input type="text" name="es_jurado_2" placeholder=""
                                    value="<?php echo $row['es_jurado_2'];?>"/></td>
                            </tr>
                            <input type="hidden" name="escuela"     placeholder=" " value="<?php echo $escuela;?>"/>
                            <input type="hidden" name="id_acta"     placeholder=" " value="<?php echo $id_acta;?>"/>
                            <input type="hidden" name="ced_tutor_acad" placeholder=" " value="<?php echo $ced_tutor_acad;?>"/>
                            <input type="hidden" name="ced_tesis"   placeholder=" " value="<?php echo $ced_tesis;?>"/>
                            <input type="hidden" name="id_jurado_2" placeholder=" " value="<?php echo $id_jurado_2;?>"/>
                            
                            <td ><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>

                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
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
            <li><a href="..escuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="tabla.php"                 class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
           <li><a href="../jurado_1/tabla.php"                  class="bla"> Jurado</a>
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
		<section class="row">
                <article >
                    <h1>Seguro de Agregar Profesor...???</h1>
                    <?php

                        include("conexion.php");
                        $conn=conectar();
                        $ci_p       =$_REQUEST['ci_p'];
                        $id_tesis_te=$_REQUEST['id_tesis_te'];
                        $estatus_tutor_acad=$_REQUEST['estatus_tutor_acad'];
                        $id_jurado_2=$_REQUEST['id_jurado_2'];

                        $query="SELECT  
                                ju3.id_ju_3,ju3.id_jurado_3,ju3.ci_jur_3,ju3.nom_ju_3,ju3.es_jurado_3,ju3.id_tesis_jurado_3,
                                te.id_te,te.id_tesis_te,te.ced_tesis,te.nom_tesis,te.es_tesis,te.titulo_tesis,
                                te.id_jurado_1,te.id_jurado_2,te.id_jurado_3,te.id_fecha_te,
                                te.id_tutor_met,te.id_menc,te.estatus_acta,
                                                                
                                pr.id_p,pr.activo,pr.ci_p,pr.es_p,pr.estatus_tu_met_pr,pr.nom_p,
                                            es.descripcion, es.escuela
                                    FROM tesis AS te
                                    INNER JOIN  jurado_3 AS ju3
                                    ON te.id_jurado_2!=ju2.id_jurado_2
                                    INNER JOIN profesor AS pr
                                    ON ju2.ci_jur_2=pr.ci_p
                                    INNER JOIN escuela AS es
                                    ON pr.es_p=es.escuela
                                    WHERE pr.activo=1
                                   AND pr.estatus_jurado_1=1
                                    AND te.id_tutor_acad!=0
                                                            
                                                                       
                                    ORDER BY id_p ASC
                                    ";
                                
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_agregar_jurado_3.php" method="POST">
                            
                           <tr>
                                <td><label bgcolor="orange">Id <br>Tesis:</label></td>
                                <td><input type="text" name="id_tesis_te" placeholder=" solo numeros..." 
                                    value="<?php echo $id_tesis_te;?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Id:</label></td>
                                <td><input type="text" name="id_jurado_3" placeholder=" solo numeros..." 
                                    value="<?php echo $row['id_jurado_3'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Cedula:</label></td>
                                <td><input type="text" name="ci_p" placeholder="" 
                                    value="<?php echo $row['ci_p'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombres<br>Apellidos:</label></td>
                                <td><input type="text" name="nom_p" placeholder="" 
                                    value="<?php echo $row['nom_p'];?>"/><br></td>
                            </tr>
                            
                            <tr>
                                <td><label>Escuela :</label></td>
                                <td><input type="text" name="es_p" placeholder=""
                                    value="<?php echo $row['es_p'];?>"/></td>
                            </tr>
                            <input type="hidden" name="estatus_tutor_acad" placeholder=" " value="<?php echo $estatus_tutor_acad;?>"/>
                            
                            <td ><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="formulario.php">Regresar</a></td></tr>

                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
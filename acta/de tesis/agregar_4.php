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
                        $id_jurado_1=$_REQUEST['id_jurado_1'];

                        $query="SELECT  
                                ju2.id_ju_2,ju2.id_jurado_2,ju2.ci_jur_2,ju2.nom_ju_2,ju2.es_jurado_2,ju2.id_tesis_jurado_2,
                                pr.id_p,pr.ci_p,pr.nom_p,pr.es_p,pr.activo,pr.estatus_tu_met_pr,
                                es.descripcion, es.escuela
                                FROM jurado_2 AS ju2
                                INNER JOIN profesor AS pr
                                ON ju2.ci_jur_2=pr.ci_p
                                INNER JOIN escuela AS es
                                ON pr.es_p=es.escuela
                                WHERE pr.activo=1
                                AND ci_p=$ci_p
                                AND pr.estatus_jurado_2=1
                                ORDER BY id_jurado_2 ASC
                                ";
                                
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_agregar_jurado_2.php" method="POST">
                            
                            <tr>
                                <td><label bgcolor="orange">Id:</label></td>
                                <td><input type="text" name="id_jurado_2" placeholder=" solo numeros..." 
                                    value="<?php echo $row['id_jurado_2'];?>"><br></td>
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
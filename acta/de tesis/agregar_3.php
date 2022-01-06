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
            <li><a href="../jurado/tabla.php"       class="bla"> Jurado</a></li>
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

                        $conn=conectar();
                        include("conexion.php");
                        $ci_p       =$_REQUEST['ci_p'];
                        $id_tesis_te=$_REQUEST['id_tesis_te'];
                        $estatus_tutor_acad=$_REQUEST['estatus_tutor_acad'];
                        $id_jurado_1=$_REQUEST['id_jurado_1'];

                        $query="SELECT  
                                ju1.id_ju_1,ju1.id_jurado_1,ju1.ci_jur_1,ju1.nom_ju_1,ju1.es_jurado_1,ju1.id_tesis_jurado_1,
                                pr.id_p,pr.ci_p,pr.nom_p,pr.es_p,pr.activo,pr.estatus_tu_met_pr,
                                es.descripcion, es.escuela
                                FROM jurado_1 AS ju1
                                INNER JOIN profesor AS pr
                                ON ju1.ci_jur_1=pr.ci_p
                                INNER JOIN escuela AS es
                                ON pr.es_p=es.escuela
                                WHERE pr.activo=1
                                AND ci_p=$ci_p
                                AND pr.estatus_jurado_1=1
                                ORDER BY id_jurado_1 ASC
                                ";
                                
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                         if($row['estatus_tu_acad_pr']==1){
                                   header("Location: formulario_3.php");
                                    }
                    ?>

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_agregar_jurado_1.php" method="POST">
                            <tr>
                                <td><label bgcolor="orange">Id <br>Tesis:</label></td>
                                <td><input type="text" name="id_tesis_te" placeholder=" solo numeros..." 
                                    value="<?php echo $row['id_tesis_te'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Id:</label></td>
                                <td><input type="text" name="id_jurado_1" placeholder=" solo numeros..." 
                                    value="<?php echo $row['id_jurado_1'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Cedula:</label></td>
                                <td><input type="text" name="ci_p" placeholder=" solo numeros..." 
                                    value="<?php echo $row['ci_p'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombres<br>Apellidos:</label></td>
                                <td><input type="text" REQUIRED name="nom_p" placeholder=" solo letras..." 
                                    value="<?php echo $row['nom_p'];?>"/><br></td>
                            </tr>
                            
                            <tr>
                                <td><label>Escuela :</label></td>
                                <td><input type="text" name="es_p" placeholder=" "
                                    value="<?php echo $row['es_p'];?>"/>
                                 </td>
                            </tr>
                            
                            

                            <td ><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="formulario.php">Regresar</a></td></tr>

                            
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
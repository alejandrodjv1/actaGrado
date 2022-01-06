<!DOCTYPE html>
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
		<section class="row">
                <article >
                    <h1>Datos del Profesor</h1>
                    <?php
                        
                        $id_jurado_3 =$_REQUEST['id_jurado_3'];

                        include("conexion.php");
                        $conn=conectar();

                        $query="SELECT  ju3.id_jurado_3,ju3.ci_jur_3,ju3.nom_ju_3,ju3.es_jurado_3,ju3.id_tesis_jurado_3,
                                    pr4.ci_p,pr4.es_p,pr4.nom_p,pr4.activo,
                                    pr4.estatus_tu_met_pr,pr4.estatus_tu_acad_pr,
                                    es.escuela,pr4.estatus_jurado_3
                                    
                            FROM    jurado_3 AS ju3
                            INNER JOIN profesor AS pr4 
                            ON ju3.ci_jur_3=pr4.ci_p
                            INNER JOIN escuela AS es 
                            ON pr4.es_p=es.escuela
                            WHERE pr4.estatus_jurado_3=1
                            
                            ORDER BY id_jurado_3 ASC
                            ";
                                
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

                    <table align="center" border="2px" class="caja2" >
                        <form action="tabla.php" method="POST">
                            <tr>
                                <td><label>Id:</label></td>
                                <td><input type="text" name="id_jurado_3" placeholder="" 
                                    value="<?php echo $row['id_jurado_3'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Cedula:</label></td>
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
                                <td><input type="text" name="es_p" placeholder=" "
                                    value="<?php echo $row['es_p'];?>"/>
                                </td>
                            </tr>
                            
                            <td><td><a href="tabla.php">Regresar</a></td></tr></td>

                            
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
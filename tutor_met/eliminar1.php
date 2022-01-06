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
     <nav class="navegacion">
        <ul class="menu">
            <li><a href="../escuela/tabla.php"      class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="tabla.php"                 class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
            <li><a href="../jurado_1/tabla.php"                 class="bla"> Jurado</a>
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
		<section class="row">
                <article >
                    <h1>Seguro de Eliminar Profesor...???</h1>
                    <?php
                        $ci_p=$_REQUEST['ci_p'];
                        $id_tu_met=$_REQUEST['id_tu_met'];

                        include("conexion.php");
                        $conn=conectar();

                        $query="SELECT  *
                                FROM  tutor_met AS tu
                                INNER JOIN profesor AS pr
                                ON tu.ced_tutor_met=$ci_p
                                INNER JOIN escuela AS es 
                                ON pr.es_p = es.escuela
                                WHERE activo=1
                                OR activo=0
                                AND estatus_tu_met_pr=1
                                AND ced_tutor_met=$ci_p
                                And id_tu_met=$id_tu_met
                                ";
                                
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

                    <table align="center" border="2px" class="caja2">
                        <form action="eliminar2.php" method="POST">
                            <tr>
                                <td><label>Id:</label></td>
                                <td><input type="text" REQUIRED name="id_tu_met" placeholder=" solo numeros..." value="<?php echo $row['id_tu_met'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Cedula:</label></td>
                                <td><input type="text" REQUIRED name="ci_p" placeholder=" solo numeros..." value="<?php echo $row['ced_tutor_met']?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombres<br>Apellidos:</label></td>
                                <td><input type="text" REQUIRED name="nom_p" placeholder=" solo letras..." value="<?php echo $row['nom_tutor_met'];?>"/><br></td>
                            </tr>
                            
                            <tr>
                                <td><label>Escuela :</label></td>
                                <td><input type="text" name="es_p" placeholder=" " value="<?php echo $row['es_p'];?>"/>
                                </td>
                            </tr>
                            
                            

                            <td ><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>

                            
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
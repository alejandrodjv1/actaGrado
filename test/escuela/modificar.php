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
                    <td><img src="../imagenes/mariño3.jpg" alt="Logo" width="700px"></td>
                </tr>
            </table>
        </div>
    </header>
     <nav class="navegacion">
        <ul class="menu">
            <li><a href="../index.html"             class="bla"> Inicio</a></li>
            <li><a href="tabla.php"                 class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
            <li><a href="../jurado/tabla.php"       class="bla"> Jurado</a></li>
            <li><a href="../acta/tabla.php"         class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../index.html"             class="bla">Salir</a></li>
        </ul>
    </nav>

                    <?php
                        $escuela=$_REQUEST['escuela'];

                        include("conexion.php");
                        $conn=conectar();

                        $query="SELECT * 
                                FROM escuela 
                                WHERE escuela='$escuela'
                                ";
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

	<center>
		<section class="row">
                <article >
                    <h1>Datos de la Escuela<br> a Modificar</h1>
                    <table  align="center" border="3" class="caja2">
                        <form action="operacion_modificar.php" method="POST">
                            <tr>
                                <td><label>ESCUELA:</label></td>
                                <td><input type="text" REQUIRED name="escuela" placeholder="<?php echo $row['escuela'];?>" 
                                    value="<?php echo $row['escuela'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>NOMBRE:</label></td>
                                <td><input type="text" REQUIRED name="descripcion" placeholder="<?php echo $row['descripcion'];?>" 
                                    value="<?php echo $row['descripcion'];?>"/><br></td>
                            </tr>
                         
                             <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            
                            <td><a href="tabla.php">Regresar</a></td>
                                                                              
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
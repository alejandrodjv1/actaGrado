<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<meta charset="utf-8">
    <link href="../css/estilosGrado.css" rel="stylesheet" type="text/css" />
     <link href="../css/estilos2.css" rel="stylesheet" type="text/css" />
     <link href="../css/estilos3.css" rel="stylesheet" type="text/css" />
    
</head>
<body>
	</head>
<body>
	<header>
        <div align="center">
            <table>
               
                <tr>
                    <td><h1>Oficina   </h1></td>
                    
                    <td><img src="../imagenes/ActoGraduacion.jpg" alt="Logo" width="100px"></td>
                    <td><h1>  Grado</h1></td>
                </tr>
            </table>
        </div>
    </header>
    <nav class="navegacion">
           <nav class="navegacion">
        <ul class="menu">
           <li><a href="../escuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="tabla.php"                 class="bla"> Tesis</a></li>
            <li><a                                  class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="../acta/tabla.php"         class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../usuarios/tabla.php"      class="bla"> Seguridad</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
		<section class="row">
                <article >
                    <h1>Datos del Estudiante</h1>
                    <?php
                        $ci_a=$_REQUEST['ci_a'];

                        include("conexion.php");
                        $conn=conectar();
                        $query="SELECT * FROM alumno WHERE ci_a='$ci_a'";
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

                    <table align="center" border="2px" >
                        <form action="operacion_modificar.php" method="POST">
                            <tr>
                                <td><label>Cedula::</label></td>
                                <td><input type="text" REQUIRED name="ci_a" placeholder="solo numeros..." value="<?php echo $row['ci_a'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombre:</label></td>
                                <td><input type="text" REQUIRED name="nombre" placeholder="solo letras..." value="<?php echo $row['nombre'];?>"/><br><br></td>
                            </tr>
                            
                            <tr>
                                <tr>
                                <td><label>Escuela :</label></td>
                                <td><input type="text" REQUIRED name="escuela" placeholder="solo numeros..." value="<?php echo $row['escuela'];?>"/><br/></td>
                            </tr>
                            <tr>
                                <td><label>Materia Pendiente:</label></td>
                                <td><input type="text" REQUIRED name="mat_Pend" placeholder="solo numeros..." value="<?php echo $row['mat_Pend'];?>"/><br/></td>
                            </tr>
                            <tr>
                                <td><label>Nota Proyecto:</label></td>
                                <td><input type="text" REQUIRED name="nota_Proy" placeholder="solo numeros..." value="<?php echo $row['nota_Proy'];?>"/><br/></td>
                            </tr>

                             <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="eliminar.php?ci_a= <?php echo $row['ci_a'];?>">Eliminar</a></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>

                            
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
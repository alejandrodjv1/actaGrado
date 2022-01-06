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
    <nav>
        <a href="../index.html"             class="neg"> Inicio</a>
        <a href="../escuela/tabla.php"      class="neg"> Escuela</a>
        <a href="../estudiante/tabla.php"   class="neg"> Estudiante</a>
        <a href="../profesor/tabla.php"     class="neg"> Profesor</a>
        <a href="../tesis/tabla.php"        class="neg"> Tesis</a>
        <a href="../jurado/tabla.php"       class="neg"> Jurado</a>
        <a href="tabla.php"                 class="neg"> Acta</a>
        <a href="../catalogo/tabla.php"     class="neg"> Catalogo</a>
        <a href="../index.html"             class="neg">Salir</a>
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
                        <form >
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

                            <td><a href="modificar.php?ci_a=<?php echo $row['ci_a'];?>">Modificar</a></td>
                            <td><a href="eliminar.php?ci_a= <?php echo $row['ci_a'];?>">Eliminar</a></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
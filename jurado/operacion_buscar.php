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
        <a href="tabla.php"                 class="neg"> Jurado</a>
        <a href="../acta/tabla.php"         class="neg"> Acta</a>
        <a href="../catalogo/tabla.php"     class="neg"> Catalogo</a>
        <a href="../index.html"             class="neg">Salir</a>
    </nav>

	<center>
		<section class="row">
                <article >
                    <h1>Datos del Jurado</h1>
                    <?php
                        $id_jurado=$_REQUEST['id_jurado'];

                        include("conexion.php");
                        $conn=conectar();
                        $query="SELECT * FROM jurado WHERE id_jurado='$id_jurado'";
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

                    <table align="center" border="2px" >
                        <form >
                            <tr>
                                <td><label>Codigo Jurado:</label></td>
                                <td><input type="text" REQUIRED name="id_jurado" placeholder="  solo numeros..." value="   <?php echo $row['id_jurado'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Codigo Tesis:</label></td>
                                <td><input type="text" REQUIRED name="id_tesis" placeholder="  solo letras..." value="   <?php echo $row['id_tesis'];?>"/><br></td>
                            </tr>
                            
                            <tr>
                                <td><label>Jurado 1:</label></td>
                                <td><input type="text" REQUIRED name="ci_jurado_1" placeholder="  solo letras..." value="   <?php echo $row['ci_jurado_1'];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>Jurado 2:</label></td>
                                <td><input type="text" REQUIRED name="ci_jurado_2" placeholder="  solo letras..." value="   <?php echo $row['ci_jurado_2'];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>Jurado 3:</label></td>
                                <td><input type="text" REQUIRED name="ci_jurado_3" placeholder="  solo letras..." value="   <?php echo $row['ci_jurado_3'];?>"/><br></td>
                            </tr>
                            

                            <td><a href="modificar.php?id_jurado=<?php echo $row['id_jurado'];?>">Modificar</a>
                            <a href="eliminar.php?id_jurado= <?php echo $row['id_jurado'];?>">Eliminar</a></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
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
        <a href="../index.html"         	class="neg"> Inicio</a>
        <a href="../escuela/tabla.php" 		class="neg"> Escuela</a>
        <a href="../estudiante/tabla.php" 	class="neg"> Estudiante</a>
        <a href="../profesor/tabla.php"   	class="neg"> Profesor</a>
        <a href="../tesis/tabla.php"    	class="neg"> Tesis</a>
        <a href="tabla.php" 				class="neg"> Jurado</a>
        <a href="../acta/tabla.php"    		class="neg"> Acta</a>
        <a href="../catalogo/tabla.php" 	class="neg"> Catalogo</a>
        <a href="../index.html"       		class="neg">Salir</a>
    </nav>
	<center>
		<article ><br>
		<table  align="center" border="3" >
			<thead>
				<tr>
					<th colspan="1"><a href="formulario.php"> Agregar </a></a></th>
					<th colspan="3"><h1>Lista de Jurado</h1></th>
					<th colspan="6"><center>
										<form action="operacion_buscar.php" method="POST">
											<table>
												<tr>Codigo Jurado:<br><input type="text" REQUIRED name=" id_jurado" placeholder=" solo numeros..." value=""/>
												</tr>		<input type="submit" value=" Buscar"/>
												</tr>
											</table>
										</form>
									</center>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>CODIGO<br> JURADO </td>
					<td>JURADO </td>
					<td>JURADO </td>
					<td>JURADO </td>
					
					<td colspan="2">OPERACIONES  </td>
				</tr>
				<?php
					include("conexion.php");
										
					$query="SELECT  ju.id_jurado,ju.ci_jurado_1,
									ju.ci_jurado_2,ju.ci_jurado_3
									
							FROM 	jurado AS ju
							
							INNER JOIN profesor AS pr1 
							ON ju.ci_jurado_1=pr1.ci_p
							INNER JOIN profesor AS pr2 
							ON ju.ci_jurado_2=pr2.ci_p
							INNER JOIN profesor AS pr3 
							ON ju.ci_jurado_3=pr3.ci_p							
							ORDER BY ju.id_jurado
							";
					$res=$conn->query($query);
					while($row=$res->fetch_assoc()){
				?>

						<tr>
							<td><?php echo $row['id_jurado'  ];?></td>
							<td><?php echo $row['ci_jurado_1'];?></td>
							<td><?php echo $row['ci_jurado_2'];?></td>
							<td><?php echo $row['ci_jurado_3'];?></td>
							
							<td colspan "6"><a href="modificar.php?id_jurado=<?php echo $row['id_jurado'];?>">Modificar</a></td>
							<td><a href="eliminar.php?id_jurado= <?php echo $row['id_jurado'];?>">Eliminar</a></td>
							
						</tr>

				<?php
					}

				?>

			</tbody>
		</table>
		</article>
	</center>
</body>
</html>

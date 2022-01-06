
<!DOCTYPE html>
<html lang="es">
<head>
	<title>TABLA</title>
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
                    
                    <td><img src="../imagenes/mariño.jpg" alt="Logo" width="100px"></td>
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
        <a href="tabla.php"   				class="neg"> Tutor</a>
        <a href="../fecha/tabla.php"		class="neg"> Fechas</a>
        <a href="../tesis/tabla.php"        class="neg"> Tesis</a>
        <a href="../jurado/tabla.php"       class="neg"> Jurado</a>
        <a href="../acta/tabla.php"         class="neg"> Acta</a>
        <a href="../catalogo/tabla.php"     class="neg"> Catalogo</a>
        <a href="../index.html"             class="neg">Salir</a>
    </nav>
    
	<center>
		<article ><br>
		<table  align="center" border="3" >
			<thead>
				<tr>
					<th colspan="2"><a href="formulario.php"> Agregar  </a></a></th>
					<th colspan="5"><h1>Listado de Tutores</h1></th>
					<th colspan="5"><center>
										<form action="operacion_buscar.php" method="POST">
											<table>
												<tr>Cedula:<br>	<input type="text" REQUIRED name=" ci_p" placeholder=" numeros sin puntos..." value=""/>
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
					<td colspan="1"> ID  </td>
					<td colspan="2">CEDULA</td>
					<td colspan="2">TUTOR<br>METODOLOGICO </td>
					<td colspan="2">CEDULA</td>
					<td colspan="2">TUTOR<br>ACADEMICOS</td>
					<td colspan="4">OPERACIONES  </td>
				</tr>
				<?php
					include("conexion.php");
							
					$query="SELECT  *
							FROM tutor 
							WHERE 1
							";
					$res=$conn->query($query);
					while($row=$res->fetch_assoc()){
				?>

						<tr>
							<td colspan="1"><?php echo $row['id_tutor'   ];?></td>
							<td colspan="2"><?php echo $row['ced_tutor_met' ];?></td>
							<td colspan="2"><?php echo $row['nom_tutor_met' ];?></td>
							<td colspan="2"><?php echo $row['ced_tutor_acad' ];?></td>
							<td colspan="2"><?php echo $row['nom_tutor_acad' ];?></td>
							
							<td colspan="3"><a href="modificar.php?ci_p=<?php echo $row['ci_p'];?>">Modificar</a></td>
							<td colspan="3"><a href="eliminar.php?ci_p= <?php echo $row['ci_p'];?>">Eliminar</a></td>
							
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

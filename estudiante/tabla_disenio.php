
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Tabla</title>
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
	        <li><a href="../index.html"         	class="bla"> Inicio</a></li>
	        <li><a href="../escuela/tabla.php" 		class="bla"> Escuela</a></li>
	        <li><a href="tabla.php"   				class="bla"> Estudiante</a>
	        	<ul class="submenu">
	        		<li><a href="tabla_arquitectura.php">Arquitectura</a></li>
	        		<li><a href="tabla_civil.php">Ingenieria Civil</a></li>
	        		<li><a href="tabla_electrica.php">Ingenieria Electrica</a></li>
	        		<li><a href="tabla_electronica.php">Ingenieria Electronica</a></li>
	        		<li><a href="tabla_industrial.php">Ingenieria Industrial</a></li>
	        		<li><a href="tabla_mant_mec.php">Ingenieria de Mantenimiento Mecanico</a></li>
	        		<li><a href="tabla_sistemas.php">Ingenieria de Sistemas</a></li>
	        		<li><a href="tabla_disenio.php">Ingenieria de Diseño Industrial</a></li>
	        		<li><a href="tabla_quimica.php">Ingenieria Quimica</a></li>
	        		<li><a href="tabla_petroleo.php">Ingenieria de Petróleo</a></li>
	        		<li><a href="tabla_agronomica.php">Ingenieria Agornónmica</a></li>
	        	</ul>
	        </li>
	        <li><a href="../profesor/tabla.php"  	class="bla"> Profesor</a></li>
	        <li><a href="../tutor_met/tabla.php"   	class="bla"> Asesor Metodologico</a></li>
	        <li><a href="../tutor_acad/tabla.php"  	class="bla"> Tutor Academico</a></li>
	        <li><a href="../fecha/tabla.php"		class="bla"> Fechas</a></li>
	        <li><a href="../tesis/tabla.php"    	class="bla"> Tesis</a></li>
	        <li><a href="../jurado/tabla.php" 		class="bla"> Jurado</a></li>
	        <li><a href="../acta/tabla.php"    		class="bla"> Acta</a></li>
	        <li><a href="../catalogo/tabla.php" 	class="bla"> Catalogo</a></li>
	        <li><a href="../index.html"       		class="bla">Salir</a></li>
	    </ul>
    </nav>

	<center>
		<article ><br>
		<table  align="center" border="3" class="caja2">
			<thead>
				<tr>
					<td colspan="2"><a href="formulario.php">Agregar</a>
									<a href="pdf/index.php" >Imprimir</a></td>
					<td colspan="4"><h1>Listado <br>de Estudiantes</h1></td>
					<td colspan="2"><center>
										<form action="operacion_buscar.php" method="POST">
											<table>
												<tr>Cedula:	<br><input type="text" REQUIRED name=" ci_a" placeholder=" solo numeros..." value=""/>
												</tr>			<input type="submit" value="Buscar"/>
												</tr>
											</table>
										</form>
									</center>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td bgcolor="orange">CEDULA </td>
					<td bgcolor="orange">NOMBRES<br>APELLIDOS </td>
					
					<td bgcolor="orange">COD<br>ESC </td>
					<td bgcolor="orange">ESCUELA </td>
					<td bgcolor="orange">MAT <br>PEND </td>
					<td bgcolor="orange">NOTA <br>PROY  </td>
					<td bgcolor="orange" colspan="7">OPERACIONES</td>
				</tr>
				<?php
					include("conexion.php");
					
					$query="SELECT  al.ci_a,al.nom_a,al.mat_pend,al.nota_proy,
									es.descripcion, es.escuela
							FROM alumno AS al
							INNER JOIN escuela AS es
							ON al.es_a=es.escuela
							AND al.es_a=48
							ORDER BY ci_a ASC
							";	
					
					$res=$conn->query($query);

					while($row=$res->fetch_assoc()){
				?>

						<tr>
							<td><?php echo $row['ci_a' ];?></td>
							<td><?php echo $row['nom_a'];?></td>
							
							<td><?php echo $row['escuela'    ];?></td>
							<td><?php echo utf8_encode($row['descripcion']);?></td>
							<td><?php echo $row['mat_pend'   ];?></td>
							<td><?php echo $row['nota_proy'  ];?></td>

							<td><a href="modificar.php?ci_a=<?php echo $row['ci_a'];?>">Modificar</a></td>
							<td><a href="eliminar.php?ci_a=<?php echo $row['ci_a'];?>">Eliminar</a></td>
							
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

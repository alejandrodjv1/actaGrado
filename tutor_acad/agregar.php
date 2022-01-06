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
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="tabla.php"                 class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
            <li><a                                  class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="../acta/tabla.php"         class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
		<section class="row">
				<article >
					<h1>Agregar Profesor a<br>Lista de Tutor Academico.???</h1>
					<?php
						$ci_p=$_REQUEST['ci_p'];

						include("conexion.php");
						$conn=conectar();

						$query="SELECT  pr.id_p,pr.ci_p, pr.nom_p, pr.es_p, pr.activo,pr.estatus_tu_acad_pr,
										es.escuela, es.descripcion
								FROM profesor AS pr
								INNER JOIN escuela AS es 
								ON pr.es_p = es.escuela
								WHERE activo=1
								AND estatus_tu_acad_pr=0
								AND ci_p='$ci_p'
								";
								
						$res=$conn->query($query);
						$row=$res->fetch_assoc();
					?>

					<table align="center" border="2px" class="caja2">
						<form action="operacion_agregar.php" method="POST">

							<tr>
								<td><label>Cedula:</label></td>
								<td><input type="text" REQUIRED name="ci_p"  value="<?php echo $row['ci_p'];?>"><br></td>
							</tr>
							<tr>
								<td><label>Nombres<br>Apellidos:</label></td>
								<td><input type="text" REQUIRED name="nom_p"  value="<?php echo $row['nom_p'];?>"/><br></td>
							</tr>
							
							<tr>
								<tr>
								<td><label>Codigo :</label></td>
								<td>
									<input type="text" name="es_p" placeholder=" "value="<?php echo $row['es_p'];?>"/>
								</td>
							<tr>
								<td><label>Escuela:</label></td>
								<td><input type="text" REQUIRED name="descripcion"  value="<?php echo utf8_encode($row['descripcion']);?>"><br></td>
							</tr>
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
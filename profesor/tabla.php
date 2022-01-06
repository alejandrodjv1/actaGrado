<?php
    session_start();
    error_reporting(0);
	if(isset($_SESSION['rol'])){
	   echo 'Sesion  de   '.$_SESSION['nombre'];}
	else{
	    echo 'no tienes session';}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Lista Profesores</title>
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
            <li><a href="tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
           <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
            <li><a 									class="bla"> Jurado</a>
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
		<article ><br>
		<table  align="center" border="3" class="caja2">
		<?php if ($_SESSION['existe']==1) {
                 echo '<html><body style="background-image:url(../imagenes/paredrocas.jpg);"><center><h1 style="background-color:blue;color:white;">Profesor Existe</h1></center></body></html>';
                 $_SESSION['existe']=0;
                        }?>
			<thead>
				<tr>
					<td colspan="2"><a href="formulario.php"> Agregar  </a></a></td>
					<td colspan="6"><h1>Listado de Profesores</h1></td>
					<td colspan="5"><center>
										<form action="operacion_buscar.php" method="POST">
											<table>
												<tr>Cedula:<br>	<input type="text" REQUIRED name="ci_p" placeholder=" numeros sin puntos..." value=""/>
												</tr>		<input type="submit" class="letra"  value="Buscar"/>
												</tr>
											</table>
										</form>
									</center>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td colspan="1"  bgcolor="orange">CEDULA </td>
					<td colspan="2"  bgcolor="orange">NOMBRES<br>APELLIDOS </td>
					<td colspan="2"  bgcolor="orange">COD.<br>ESC.</td>
					<td colspan="2"  bgcolor="orange">ESCUELA </td>
					<td colspan="2"  bgcolor="orange">ESTATUS  </td>
					
					<td colspan="4"  bgcolor="orange">OPERACIONES  </td>
				</tr>
				<?php
					include("conexion.php");
							
					$query="SELECT  *
							FROM profesor AS pr
							INNER JOIN escuela AS es
							ON pr.es_p=es.escuela
							
							ORDER BY escuela ASC
							";
					$res=$conn->query($query);
					while($row=$res->fetch_assoc()){
				?>

						<tr>
							<td colspan="1"><?php echo $row['ci_p'   ];?></td>
							<td colspan="2"><?php echo $row['nom_p' ];?></td>
							<td colspan="2"><?php echo $row['es_p'];?></td>
							<td colspan="2"><?php echo utf8_encode($row['descripcion']);?></td>
							<?php if($row['activo']==1)$activo="Activo";
									elseif($row['activo']==0)$activo="Inactivo";?>
							<td colspan="2"><?php echo $activo;?></td>
							
							<td colspan="3"><a href="modificar.php?ci_p=<?php echo $row['ci_p'];?>&es_p=<?php echo $row['es_p'];?>">Modificar</a></td>
							<td colspan="3"><a href="eliminar.php?ci_p=<?php echo $row['ci_p'];?>">Eliminar del Sistema</a></td>
							
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

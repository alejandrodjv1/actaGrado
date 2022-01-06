<?php
    session_start();
    error_reporting(0);
	if(isset($_SESSION['rol'])){
	   echo 'Sesion  de   '.$_SESSION['nombre'];}
	else{
	    echo 'no tienes session';}
	
?>
<DOCTYPE html>
<html lang="es">
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
                    <td ><img src="../imagenes/L.png" alt="Logo" ></td>
                </tr>
            </table>
        </div>
    </header>
		<?php if ($_SESSION['existe']==1) {
                                    echo '<html><body style="background-image:url(../imagenes/paredrocas.jpg);"><center><h1 style="background-color:blue;color:white;">Nombre de la Escuela Existe</h1></center></body></html>';
                                    $_SESSION['existe']=0;
                        }?>
    <nav class="navegacion">
        <ul class="menu">
           	<li><a href="tabla.php"                 class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
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
			<thead>
				<tr>
					<td colspan="1"><a href="formulario.php"> Agregar </a><br>
									<a href="pdf/index.php"> Imprimir </a></td>
					<td colspan="5"><h1>Listado de Escuelas</h1></td>
					<td colspan="6"><center>
										<form action="operacion_buscar.php" method="POST">
											<table>
												<tr>Codigo Escuela:<br><input type="text" REQUIRED name="escuela" 
													placeholder=" solo numeros..."  autofocus autocomplete="off" value=""/>
												</tr>		  		   <input type="submit" value=" Buscar"/>
											</table>
										</form>
									</center>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td  bgcolor="orange">CODIGO<br>ESCUELA</td>
					<td  bgcolor="orange">NOMBRE DE ESCUELA</td>
										
					<td  bgcolor="orange" colspan="6"> OPERACIONES  </td>
				</tr>
				<?php
					include("conexion.php");
										
					$query="SELECT * FROM escuela";
					$res=$conn->query($query);
					while($row=$res->fetch_assoc()){
				?>

						<tr>
							<td ><?php echo $row['escuela'];?></td>
							<td ><?php echo utf8_encode ($row['descripcion']);?></td>
														
							<td colspan="5"><a href="modificar.php?escuela=<?php echo $row['escuela'];?>">Modificar</a></td>
							<td colspan="5"><a href="eliminar.php?escuela=<?php echo $row['escuela'];?>">Eliminar</a></td>
							
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

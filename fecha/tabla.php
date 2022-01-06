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
                    <td><img src="../imagenes/L.png" alt="Logo" width="700px"></td>
                </tr>
            </table>
        </div>
    </header>
    <ul class="menu">
           	<li><a href="../escuela/tabla.php"      class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="tabla.php"        class="bla"> Fechas</a></li>
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
					<td colspan="5"><h1>Lista de Fecha</h1></td>
						<?php 
							if ($_SESSION['existe']==1) {
				                    echo '<html><body style="background-image:url(../imagenes/paredrocas.jpg);"><center><h1 style="background-color:blue;color:white;">Fecha Ya Existe</h1></center></body></html>';
				                    $_SESSION['no_existe']=0;}
							if ($_SESSION['no_existe']==1) {
                                    echo '<html><body style="background-image:url(../imagenes/paredrocas.jpg);"><center><h1 style="background-color:blue;color:white;">Fecha No Existe</h1></center></body></html>';
                                    $_SESSION['no_existe']=0;}
                        ?>
					<td colspan="6"><center>
										<form action="modificar.php" method="POST">
											<table>
												<tr>Codigo fecha:<br><input type="text" REQUIRED name="id_fecha" 
													placeholder="solo numeros..." value="" autofocus autocomplete="off"/>
												</tr>		<input type="submit" value="Buscar"/>
												</tr>
											</table>
										</form>
									</center>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td  bgcolor="orange">ID FECHA: </td>
					<td  bgcolor="orange">FECHA DE<br> PREDEFENSA: </td>
					<td  bgcolor="orange">AULA<br>PRE:  </td>
					<td  bgcolor="orange">FECHA DE<br> DEFENSA: </td>
					<td  bgcolor="orange">AULA<br>DEF:  </td>
					<td  bgcolor="orange">FECHA<br>ASIGNADA:  </td>
					<td  bgcolor="orange">SEMESTRE:  </td>
					<td  bgcolor="orange">AÑO:  </td>

					<td  bgcolor="orange" colspan="3">OPERACIONES  </td>
				</tr>
				
				<?php
					include("conexion.php");

					//id_fecha, fecha,hora,semestre,ao
					$query="SELECT *
							FROM  fecha";
					$res=$conn->query($query);
					while($row=$res->fetch_assoc()){
				?>
						<tr>
							<td><?php echo $row['id_fecha'];?></td>

							<?php //------------------------------------------------//*
							$f1=explode('-',$row['fecha_pre']);
							$fecha_p=array($f1[2],$f1[1],$f1[0]);
							$fecha_pre=implode("/",$fecha_p);
							//$h1=explode(' ',$row['hora_pre']);
							//$hora_present_1=$h1[0]." ".$h1[1];?>
							<td><?php echo $fecha_pre;?><br><?php echo $row['hora_pre'];?></td>

							<td><?php echo $row['aula_pre'];?></td>

							<?php //---------------------------------------------------//*
							$f2=explode('-',$row['fecha_def']);
							$fecha_d=array($f2[2],$f2[1],$f2[0]);
							$fecha_def=implode("/",$fecha_d);
							//$h1=explode(' ',$row['hora_pre']);
							//$hora_present_1=$h1[0]." ".$h1[1];?>
							<td><?php echo $fecha_def;?><br><?php echo $row['hora_def'];?></td>

							<td><?php echo $row['aula_def'];?></td>

							<?php if($row['estatus_fecha_tesis']==1){$asignada="SI";}
									elseif($row['estatus_fecha_tesis']==0)$asignada="NO";?>
							<td><?php echo $asignada;?></td>

							<td><?php echo $row['semestre'];?></td>

							<td><?php echo $ao=$f1[0]-2000;?></td>
							
							<td><a href="modificar.php?id_fecha=<?php echo $row['id_fecha'];?>&estatus_fecha_tesis=<?php echo $row['estatus_fecha_tesis'];?>">Modificar</a></td>
							<td><a href="eliminar.php?id_fecha=<?php echo $row['id_fecha'];?>&estatus_fecha_tesis=<?php echo $row['estatus_fecha_tesis'];?>">Eliminar</a></td>
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

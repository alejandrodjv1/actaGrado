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
	<title>TABLA</title>
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
            <li><a href="tabla.php"   class="bla"> Tutor Academico</a></li>
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
    </nav>
    
	<center>
		<article ><br>
		<table  align="center" border="3" class="caja2">
			<thead>
				<tr>
					<td colspan="1"><a href="formulario.php">Agregar Tutor</a></td>
					<td colspan="6"><h1>Listado de Tutor<br>Academico</h1></td>
					<td colspan="6"><center>
										<form action="operacion_buscar.php" method="POST">
											<table>
												<tr>CEDULA:<br>	<input type="text" REQUIRED name="ced_tutor_acad" placeholder=" numeros sin puntos..." value=""/>
												</tr>			<input type="submit" value=" Buscar"/>
												</tr>
											</table>
										</form>
									</center>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
				<tr><td 			 bgcolor="orange"></td>
					<td colspan="6"  bgcolor="orange"></td>
					
					<td colspan="4"  bgcolor="#F4FA58">Estatus INACTIVO </td>
				</tr>
				<tr>
					<td colspan="1"  bgcolor="orange">ID</td>
					<td colspan="2"  bgcolor="orange">CEDULA</td>
					<td colspan="2"  bgcolor="orange">NOMBRE</td>
					<td colspan="1"  bgcolor="orange">COD.<br>ESC.</td>
					<td colspan="1"  bgcolor="orange">ESCUELA</td>
					
					<td colspan="4"  bgcolor="orange">OPERACIONES  </td>
				</tr>
				</tr>
				<?php
					include("conexion.php");
					
					$query="SELECT  *                                    
							FROM 	tutor_acad AS tu
							INNER JOIN profesor AS pr4 
							ON tu.ced_tutor_acad=pr4.ci_p
							INNER JOIN escuela AS es 
							ON tu.esc_tu_acad=es.escuela
							WHERE pr4.estatus_tu_acad_pr=1
							
							ORDER BY id_tu_acad ASC
							";
					$res=$conn->query($query);
					while($row=$res->fetch_assoc()){
				?> 
						<tr>
							<td colspan="1"><?php echo $row['id_tu_acad'];?></td>
							<?php 	if($row['activo']==1){?>
										<td colspan="2"><?php echo $row['ced_tutor_acad'];?></td>
										<td colspan="2"><?php echo $row['nom_tutor_acad' 		];?></td>
										<td colspan="1"><?php echo $row['esc_tu_acad' 		];?></td>
										<td colspan="1"><?php echo utf8_encode($row['descripcion' 		]);?></td><?php

									}elseif($row['activo']==0){?>
										<td colspan="2" bgcolor="#F4FA58">	<?php echo $row['ced_tutor_acad'];?></td>
										<td colspan="2" bgcolor="#F4FA58">	<?php echo $row['nom_tutor_acad' 		];?></td>
										<td colspan="1" bgcolor="#F4FA58"><?php echo $row['esc_tu_acad' 		];?></td>
										<td colspan="1"><?php echo utf8_encode($row['descripcion' 		]);?></td><?php
									}?>	
							
							<td colspan="3" ><a href="eliminar1.php?ci_p=<?php echo $row['ci_p'];?>&id_tu_acad=<?php echo $row['id_tu_acad'];?>">Eliminar</a></td>
							
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

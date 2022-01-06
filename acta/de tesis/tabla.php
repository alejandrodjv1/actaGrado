
<!DOCTYPE html>
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
    <nav class="navegacion">
    	<ul class="menu">
	        <li><a href="../index.html"         	class="bla"> Inicio</a></li>
	        <li><a href="../escuela/tabla.php" 		class="bla"> Escuela</a></li>
	        <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
	        <li><a href="../profesor/tabla.php"  	class="bla"> Profesor</a></li>
	        <li><a href="../tutor_met/tabla.php"   	class="bla"> Asesor Metodologico</a></li>
	        <li><a href="../tutor_acad/tabla.php"  	class="bla"> Tutor Academico</a></li>
	        <li><a href="../fecha/tabla.php"		class="bla"> Fechas</a></li>
	        <li><a href="tabla.php"   				class="bla"> Tesis</a></li>
	        <li><a href="../jurado_1/tabla.php"					class="bla"> Jurado</a>
	       		<ul class="submenu">
	        		<li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
	        	</ul>
	        </li>
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
					<td colspan="3"><a href="formulario.php"> Agregar </a>
									<a href="pdf/index.php"> Imprimir </a></td>
					<td colspan="11"><h1>TESIS DE INGENIERIA DE SISTEMAS</h1></td>
					<td colspan="2"><center>
										<form action="operacion_buscar.php" method="POST">
											<table>
												<tr>Codigo tesis:<br><input type="text" REQUIRED name=" id_tesis_te" 
													placeholder=" solo numeros..." value=""/>
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
					<td  bgcolor="orange">ID TESIS:</td>
					<td  bgcolor="orange">AUTOR: </td>
					<td  bgcolor="orange" colspan="2">ASESOR<br> METODOLOGICO:  </td>
					<td  bgcolor="orange" colspan="2">TUTOR<br> ACADEMICO:  </td>
					<td  bgcolor="orange" colspan="2">PRIMER JURADO</td>
					<td  bgcolor="orange" colspan="2">SEGUNDO JURADO</td>
					<td  bgcolor="orange" colspan="2">TERCER JURADO</td>
					<td  bgcolor="orange" colspan="1">FECHA DE<br> PREDEFENSA: </td>
					
					<td  bgcolor="orange" colspan="1">FECHA DE<br> DEFENSA: </td>
					
					<td  bgcolor="orange" colspan="1">OPERACIONES  </td>
				</tr>
				
				<?php		
				include("conexion.php");
				$query="SELECT  
								al.ci_a,al.nom_a,al.mat_pend,al.nota_proy,
								es.descripcion, es.escuela,
								tu_met.id_tu_met,tu_met.ced_tutor_met,tu_met.nom_tutor_met,
								tu_acad.id_tu_acad,tu_acad.ced_tutor_acad,tu_acad.nom_tutor_acad,
								te.id_te,te.id_tesis_te,te.ced_tesis,te.nom_tesis,te.es_tesis,te.titulo_tesis,
								te.id_jurado_1,te.id_jurado_2,te.id_jurado_3,te.id_fecha_te,te.id_tutor_met,
								te.id_tutor_acad,te.id_menc,te.estatus_acta,
																
								pr.activo,pr.ci_p,pr.es_p,pr.estatus_tu_met_pr,
								ju1.id_tesis_jurado_1,ju1.ci_jur_1,ju1.nom_ju_1,
								ju2.id_tesis_jurado_2,ju2.ci_jur_2,ju2.nom_ju_2,
								ju3.id_tesis_jurado_3,ju3.ci_jur_3,ju3.nom_ju_3,
								pr.activo,pr.ci_p,pr.nom_p,pr.es_p,pr.estatus_tu_acad_pr,
								fe.id_fecha, fe.fecha_pre,fe.hora_pre,fe.fecha_def,fe.hora_def,
								fe.semestre,fe.ao,fe.estatus_fecha_tesis,fe.aula_def,fe.aula_pre
						FROM tesis AS te
						INNER JOIN alumno AS al
						ON te.ced_tesis=al.ci_a
						INNER JOIN 	tutor_met AS tu_met
						ON te.id_tutor_met=tu_met.id_tu_met
						INNER JOIN 	tutor_acad AS tu_acad
						ON te.id_tutor_acad=tu_acad.id_tu_acad
						INNER JOIN profesor AS pr
                        ON tu_met.ced_tutor_met=pr.ci_p
                        INNER JOIN profesor AS pr1
                        ON tu_acad.ced_tutor_acad=pr1.ci_p
						INNER JOIN jurado_1 AS ju1
						ON te.id_jurado_1=ju1.id_jurado_1
						INNER JOIN jurado_2 AS ju2
						ON te.id_jurado_2=ju2.id_jurado_2
						INNER JOIN jurado_3 AS ju3
						ON te.id_jurado_3=ju3.id_jurado_3
						
						INNER JOIN fecha AS fe
						ON te.id_fecha_te=fe.id_fecha
						INNER JOIN escuela AS es
						ON al.es_a=es.escuela
						WHERE estatus_tesis=1
						 
						ORDER BY te.id_tesis_te ASC
						";	
						
							

				$res=$conn->query($query);
				while($row=$res->fetch_assoc()){?>
					<tr>
					
                   	<td rowspan="2"><?php echo $row['id_tesis_te']?></td>
					<td><?php echo $row['ci_a'];?><br><?php echo $row['nom_a'];?></td>
					<td colspan="2"><?php echo "V- ".$row['ced_tutor_met' ]?><br><?php echo $row['nom_tutor_met' ];?></td>
					<td colspan="2"><?php echo "V- ".$row['ced_tutor_acad' ]?><br><?php echo $row['nom_tutor_acad' ];?></td>
					<td colspan="2"><?php echo "V- ".$row['ci_jur_1' ];?><br><?php echo $row['nom_ju_1' ];?></td>
					<td colspan="2"><?php echo "V- ".$row['ci_jur_2' ];?><br><?php echo $row['nom_ju_2' ];?></td>
					<td colspan="2"><?php echo "V- ".$row['ci_jur_3' ];?><br><?php echo $row['nom_ju_3' ];?></td>
					<td colspan="1"><?php $f1=explode('-',$row['fecha_pre']);
									$fecha_present_1=$f1[2]."/".$f1[1]."/".$f1[0];
									$h1=explode(':',$row['hora_pre']);
									$hora_present_1=$h1[0].":".$h1[1];?>
									<?php echo $fecha_present_1;?><br>
									<?php echo $hora_present_1;?><br>
									<?php echo $row['aula_pre'];?></td>
					</td>
					<td colspan="1"><?php $f2=explode('-',$row['fecha_def']);
									$fecha_present_2=$f2[2]."/".$f2[1]."/".$f2[0];
									$h2=explode(':',$row['hora_def']);
									$hora_present_2=$h2[0].":".$h2[1];?>
									<?php echo $fecha_present_2;?><br>
									<?php echo $hora_present_2;?><br>
									<?php echo $row['aula_def'];?></td>
					<td rowspan="1"><a href="eliminar.php?id_tesis_te=<?php echo $row['id_tesis_te'];?>&ci_a=<?php echo $row['ci_a'];?>">Eliminar Tesis</a></td>
					</tr>
					<tr>
					<td  bgcolor="orange">TITULO: </td>
					<td colspan="13"><?php echo $row['titulo_tesis'];?></td>
					</tr>
					<td colspan="15" bgcolor="black"></td>
					
                   
					</tr>

					

					
					<?php
				}?>			
						
			</tbody>
		</table>
		</article>
	</center>
</body>
</html>

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
   <nav class="navegacion">
    	<ul class="menu">
	        <li><a href="../index.html"         	class="bla"> Inicio</a></li>
	        <li><a href="../escuela/tabla.php" 		class="bla"> Escuela</a></li>
	        <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
	        <li><a href="../profesor/tabla.php"  	class="bla"> Profesor</a></li>
	        <li><a href="../tutor_met/tabla.php"   	class="bla"> Asesor Metodologico</a></li>
	        <li><a href="../tutor_acad/tabla.php"  	class="bla"> Tutor Academico</a></li>
	        <li><a href="../fecha/tabla.php"		class="bla"> Fechas</a></li>
	        <li><a href="../tesis/tabla.php"    	class="bla"> Tesis</a></li>
	        <li><a href="../jurado_1/tabla.php"		class="bla"> Jurado</a>
	       		<ul class="submenu">
	        		<li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
	        	</ul>
	        </li>
	        <li><a href="tabla.php"    				class="bla"> Acta</a></li>
	        <li><a href="../catalogo/tabla.php"		class="bla"> Catalogo</a></li>
	        <li><a href="../index.html"       		class="bla">Salir</a></li>
	    </ul>
    </nav>
	<center>
		<article ><br>
		<table  align="center" border="3" class="caja2">
			<thead>
				<tr>
					<td colspan="3"><a href="formulario_tesis.php"> Agregar </a>
									
					<td colspan="6"><h1>Lista de Actas</h1></td>
					<td colspan="3"><center>
										<form action="tabla_buscar.php" method="POST">
											<table>
												<tr>Cedula tesista:<br><input type="hidden" name="id_tesis_te" 
													placeholder="" value=""/>
													<input type="text" REQUIRED name="ced_tesis" 
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
					<td  bgcolor="orange" colspan="1">AUTOR: </td>
					<td  bgcolor="orange" colspan="1">ESCUELA: </td>
					<td  bgcolor="orange" colspan="1">ASESOR<br> METODOLOGICO:  </td>
					<td  bgcolor="orange" colspan="1">TUTOR<br> ACADEMICO:  </td>
					<td  bgcolor="orange" colspan="1">PRIMER<br> JURADO:  </td>
					<td  bgcolor="orange" colspan="1">SEGUNDO<br> JURADO:  </td>
					<td  bgcolor="orange" colspan="1">TERCER<br> JURADO:  </td>
					<td  bgcolor="orange" colspan="1">NOTA<br> DEFINITIVA:  </td>
					<td  bgcolor="orange" colspan="1">MENCION<br>TESIS:  </td>
					<td  bgcolor="orange" colspan="1">FECHA<br> PREDEFENSA:  </td>
					<td  bgcolor="orange" colspan="1">FECHA<br> DEFENSA:  </td>
					<td  bgcolor="orange" colspan="2">OPERACIONES  </td>
				</tr>
											
				<?php		
				include("conexion.php");

				$query="SELECT *
						FROM  acta AS ac
						INNER JOIN tesis AS te
						ON ac.id_tesis=te.id_tesis_te
						INNER JOIN alumno AS al
			            ON te.ced_tesis=al.ci_a
			           	INNER JOIN 	tutor_met AS tu_met
						ON te.id_tutor_met=tu_met.id_tu_met
						INNER JOIN 	tutor_acad AS tu_acad
						ON te.id_tutor_acad=tu_acad.id_tu_acad
						INNER JOIN jurado_1 AS ju1
			            ON ac.id_jurado_1=ju1.id_jurado_1
			             INNER JOIN jurado_2 AS ju2
			            ON ac.id_jurado_2=ju2.id_jurado_2
			            INNER JOIN jurado_3 AS ju3
			            ON ac.id_jurado_3=ju3.id_jurado_3
						INNER JOIN escuela AS es
						ON al.es_a=es.escuela
						INNER JOIN fecha AS fe
						ON ac.id_fecha_te=fe.id_fecha
						INNER JOIN mencion AS me
						ON ac.id_menc=me.id_menc
						WHERE te.estatus_acta=1
						
						ORDER BY id_acta ASC
						";	?>
				<?php
				$res=$conn->query($query);
				while($row=$res->fetch_assoc()){?>
					<?php //-CUADRE DE FECHA PREDEFENSA PARA FORMA dd/mm/aaaa----------------//*
							$f1=explode('-',$row['fecha_pre']);
							$fecha_p=array($f1[2],$f1[1],$f1[0]);
							$fecha_pre=implode("/",$fecha_p);
							$h1=explode(' ',$row['hora_pre']);
							$hora_pre=$h1[0]." ".$h1[1];
							$aula_pre= $row['aula_pre'];?>

					<?php //--CUADRE DE FECHA DEFENSA PARA FORMA dd/mm/aaaa-----------------//*
							$f2=explode('-',$row['fecha_def']);
							$fecha_d=array($f2[2],$f2[1],$f2[0]);
							$fecha_def=implode("/",$fecha_d);
							$h1=explode(' ',$row['hora_def']);
							$hora_def=$h1[0]." ".$h1[1];
							$aula_def= $row['aula_def'];?>
					<?php
						if($row["id_acta"]<=9){$num_acta="00".$row["id_acta"];}
                       	elseif(($row["id_acta"]>=10)||($row["id_acta"]<=99)){$num_acta="0".$row["id_acta"];}
						$ac = array($row['escuela'],$row['ao'],$row['semestre'],$num_acta);
                        $acta  = implode("",$ac );?>
					<tr>
						<td rowspan="4"><?php echo $acta?></td>
						<td colspan="1"><?php echo "V- ".$row['ced_tesis'];?><br><?php echo $row['nom_tesis'];?></td>
						<td COLspan="1"><?php echo utf8_encode($row['descripcion'])?></td>
						<td colspan="1"><?php echo "V- ".$row['ced_tutor_met' ]?><br><?php echo utf8_encode($row['nom_tutor_met' ]);?></td>
						<td colspan="1"><?php echo "V- ".$row['ced_tutor_acad' ]?><br><?php echo utf8_encode($row['nom_tutor_acad' ]);?></td>
						<td colspan="1"><?php echo "V- ".$row['ci_jur_1' ]?><br><?php echo utf8_encode($row['nom_ju_1' ]);?><br><a href="formulario_3_mod.php?id_acta=<?php echo $row['id_acta'];?>&id_tesis_te=<?php echo $row['id_tesis_te'];?>&escuela=<?php echo $row['escuela'];?>&ced_tutor_acad=<?php echo $row['ced_tutor_acad'];?>";>Cambiar</a> </td>
						<td colspan="1"><?php echo "V- ".$row['ci_jur_2' ]?><br><?php echo utf8_encode($row['nom_ju_2' ]);?><br><a href="formulario_4_mod.php?id_acta=<?php echo $row['id_acta'];?>&id_tesis_te=<?php echo $row['id_tesis_te'];?>&escuela=<?php echo $row['escuela'];?>&ced_tutor_acad=<?php echo $row['ced_tutor_acad'];?>";>Cambiar</a> </td>
						<td colspan="1"><?php echo "V- ".$row['ci_jur_3' ]?><br><?php echo utf8_encode($row['nom_ju_3' ]);?><br><a href="formulario_5_mod.php?id_acta=<?php echo $row['id_acta'];?>&id_tesis_te=<?php echo $row['id_tesis_te'];?>&escuela=<?php echo $row['escuela'];?>&ced_tutor_acad=<?php echo $row['ced_tutor_acad'];?>";>Cambiar</a> </td>
						<td colspan="1"><?php echo $row['nota_ac' ]?><br>										   			<a href="formulario_nota.php?id_acta=<?php echo $row['id_acta'];?>&nota_ac=<?php echo $row['nota_ac'];?>&id_menc=<?php echo $row['id_menc'];?>&ced_tesis=<?php echo $row['ced_tesis'];?>">Cambiar</a> </td>
						<td colspan="1"><?php echo $row['id_menc']?><br><?php echo utf8_encode($row['mencion']);?><br> 		<a href="formulario_nota.php?id_acta=<?php echo $row['id_acta'];?>&nota_ac=<?php echo $row['nota_ac'];?>&id_menc=<?php echo $row['id_menc'];?>&ced_tesis=<?php echo $row['ced_tesis'];?>">Cambiar</a> </td>
						<td colspan="1"><?php echo $fecha_pre?><br><?php echo $hora_pre;?><br><?php echo $aula_pre;?><br>	<a href="operacion_limpiar_lista_fecha.php?id_acta=<?php echo $row['id_acta'];?>&id_fecha=<?php echo $row['id_fecha'];?>&estatus_fecha_tesis=<?php echo $row['estatus_fecha_tesis'];?>">Cambiar</a> </td>
						<td colspan="1"><?php echo $fecha_def?><br><?php echo $hora_def;?><br><?php echo $aula_def;?><br>	<a href="operacion_limpiar_lista_fecha.php?id_acta=<?php echo $row['id_acta'];?>&id_fecha=<?php echo $row['id_fecha'];?>&estatus_fecha_tesis=<?php echo $row['estatus_fecha_tesis'];?>">Cambiar</a> </td>
						
						<td colspan="1"><a href="eliminar.php?id_acta=<?php echo $row['id_acta'];?>&ci_a=<?php echo $row['ci_a'];?>&id_tesis_te=<?php echo $row['id_tesis_te'];?>&estatus_fecha_tesis=<?php echo $row['estatus_fecha_tesis'];?>&id_fecha=<?php echo $row['id_fecha'];?>">Eliminar</a><br>
										<a href="pdf/acta_pdf_1.php?id_acta=<?php echo $row['id_acta'];?>&ced_tesis=<?php echo $row['ced_tesis'];?>">Imprimir  Acta</a></td>
	                </tr>
					<tr>
						<td  bgcolor="orange" class="letra">TITULO: </td>
						<td colspan="10"><?php echo utf8_encode($row['titulo_tesis']);?></td>
						<tr><td></td>
							<td><input type="hidden" name="ci_jur_1" value="<?php echo $row['ci_jur_1'];?>"/><br></td>
							<td><input type="hidden" name="nom_ju_1" value="<?php echo $row['nom_ju_1'];?>"/><br></td>
			                <td><input type="hidden" name="ci_jur_2" value="<?php echo $row['ci_jur_2'];?>"/><br></td>
			                <td><input type="hidden" name="nom_ju_2" value="<?php echo $row['nom_ju_2'];?>"/><br></td>
			                <td><input type="hidden" name="ci_jur_3" value="<?php echo $row['ci_jur_3'];?>"/><br></td>
			                <td><input type="hidden" name="nom_ju_3" value="<?php echo $row['nom_ju_3'];?>"/><br></td>
			                <td><input type="hidden" name="nota_ac" value="<?php echo $row['nota_ac'];?>"/><br></td>
			                <td><input type="hidden" name="id_menc" value="<?php echo ($row['id_menc']);?>"/></td>
							<td><input type="hidden" name="mencion" value="<?php echo utf8_encode($row['mencion']);?>"/><br></td>
							<td><input type="hidden" name="estatus_fecha_tesis" value="<?php echo utf8_encode($row['estatus_fecha_tesis']);?>"/><br></td>
							<td></td>
						</tr>
						<td colspan="11" bgcolor="black"><?php echo " ";?></td>
					</tr>
			
					<?php
				}?>			
						
			</tbody>
		</table>
		</article>
	</center>
</body>
</html>

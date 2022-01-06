
<?php 
$ced_tesis=$_REQUEST['ced_tesis'];
$es_tesis=$_REQUEST['es_tesis'];
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
	        <li><a href="../catalogo/tabla.php"		class="bla"> Catalogo</a></li>
	        <li><a href="../index.html"       		class="bla">Salir</a></li>
	    </ul>
    </nav>
	<center>
		<article ><br>
				
		<table  align="center" border="3" class="caja2">
			<thead>
				<tr>
					<td colspan="1"><a href="formulario.php"> Agregar </a>
									<a href="pdf/index.php"> Imprimir </a></td>
					<td colspan="5"><h1>LISTA DE TESIS </h1></td>
					<td colspan="3"><center>
										<form action="tabla_buscar.php" method="POST">
											<table>
												<tr>Cedula tesista:<br><input type="hidden" name="id_tesis_te" 
													placeholder="" value=""/>
													<input type="text" name="ced_tesis" 
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
					<td  bgcolor="orange" colspan="2">ESCUELA: </td>
					<td  bgcolor="orange" colspan="1">ASESOR<br> METODOLOGICO:  </td>
					<td  bgcolor="orange" colspan="1">TUTOR<br> ACADEMICO:  </td>
					
					<td  bgcolor="orange" colspan="2">OPERACIONES  </td>
				</tr>
				
						
							
				<?php		
				include("conexion.php");
				$query="SELECT  
						te.id_tesis_te,te.ced_tesis,te.nom_tesis,te.es_tesis,te.titulo_tesis,te.id_tutor_met,te.id_tutor_acad,
						al.ci_a,al.nom_a,al.mat_pend,al.nota_proy,al.estatus_tesis,
						tu_met.id_tu_met,tu_met.ced_tutor_met,tu_met.nom_tutor_met,
						tu_acad.id_tu_acad,tu_acad.ced_tutor_acad,tu_acad.nom_tutor_acad,
						pr.ci_p,pr.nom_p,pr.es_p,pr.activo,pr.estatus_tu_met_pr,pr.estatus_tu_acad_pr,
						pr1.ci_p,pr1.nom_p,pr1.es_p,pr1.activo,pr1.estatus_tu_met_pr,pr1.estatus_tu_acad_pr,
						es.descripcion, es.escuela
						
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
						
						INNER JOIN escuela AS es
						ON al.es_a=es.escuela
						WHERE te.ced_tesis=$ced_tesis
						
					
						ORDER BY te.id_tesis_te ASC
						";	?>
				<?php
				$res=$conn->query($query);
				while($row=$res->fetch_assoc()){?>
					
					<tr>
					
                   	<td rowspan="2"class="letra"><?php echo $row['id_tesis_te']?></td>
					<td colspan="1"><?php echo $row['ced_tesis'];?><br><?php echo $row['nom_tesis'];?></td>
					<td COLspan="2"><?php echo utf8_encode($row['descripcion'])?></td>
					<td colspan="1"><?php echo "V- ".$row['ced_tutor_met' ]?><br><?php echo $row['nom_tutor_met' ];?></td>
					<td colspan="1"><?php echo "V- ".$row['ced_tutor_acad' ]?><br><?php echo $row['nom_tutor_acad' ];?></td>
					
					
					<td colspan="1"><a href="eliminar.php?id_tesis_te=<?php echo $row['id_tesis_te'];?>&ced_tesis=<?php echo $row['ced_tesis'];?>&id_fecha=<?php echo $row['id_fecha'];?>">Eliminar</a>
									<a href="modificar.php?id_tesis_te=<?php echo $row['id_tesis_te'];?>&ced_tesis=<?php echo $row['ced_tesis'];?>">Modificar</a><br>
									
					</tr>
					<tr>
					<td  bgcolor="orange" class="letra">TITULO: </td>
					<td colspan="7"><?php echo $row['titulo_tesis'];?></td>
					</tr>
					<td colspan="9" bgcolor="black"></td>
					
					</tr>
				
					<?php
				}?>			
						
			</tbody>
		</table>
		</article>
	</center>
</body>
</html>

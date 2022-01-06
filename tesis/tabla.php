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
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="tabla.php"        class="bla"> Tesis</a></li>
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
					
					<td colspan="1"><a href="formulario.php">Agregar<br>Tesis</a>
					<td colspan="1"><a href="pdf/index.php">Imprimir Lista</a></td>
					<td colspan="4"><h1>LISTA DE TESIS </h1></td>
					<td colspan="2"><center>
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
					
					<td  bgcolor="orange" colspan="3">OPERACIONES  </td>
				</tr>
				
						
							
				<?php		
				include("conexion.php");
				$query="SELECT  * 						
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
						
					
						ORDER BY te.id_tesis_te ASC
						";	?>
				<?php
				$res=$conn->query($query);
				while($row=$res->fetch_assoc()){?>
					
					<tr>
					
                   	<td rowspan="2"class="letra"><?php echo $row['id_tesis_te']?></td>
					<td colspan="1"><?php echo $row['ced_tesis'];?><br><?php echo $row['nom_tesis'];?></td>
					<td colspan="2"><?php echo utf8_encode($row['descripcion'])?></td>
					<td colspan="1"><?php echo "V- ".$row['ced_tutor_met' ]?><br><?php echo $row['nom_tutor_met' ];?></td>
					<td colspan="1"><?php echo "V- ".$row['ced_tutor_acad' ]?><br><?php echo $row['nom_tutor_acad' ];?></td>
					
					
					<td colspan="3"><a href="../acta/tabla.php?id_tesis_te=<?php echo $row['id_tesis_te'];?>&ced_tesis=<?php echo $row['ced_tesis'];?>&titulo_tesis<?php echo $row['titulo_tesis'];?>">Preparar Acta</a>
									<a href="modificar.php?id_tesis_te=<?php echo $row['id_tesis_te'];?>&ced_tesis=<?php echo $row['ced_tesis'];?>">Modificar</a>
									<a href="eliminar.php?id_tesis_te=<?php echo $row['id_tesis_te'];?>&ced_tesis=<?php echo $row['ced_tesis'];?>">Eliminar</a>
									
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

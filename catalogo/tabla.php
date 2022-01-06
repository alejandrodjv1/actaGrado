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
    <nav class="navegacion">
           <nav class="navegacion">
        <ul class="menu">
           <li><a href="../escuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
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
            <li><a href="tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../usuarios/tabla.php"      class="bla"> Seguridad</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
    </nav>
	<center>
		<article ><br>
				
		<table  align="center" border="3" class="caja2">
			<thead>
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
						
						INNER JOIN escuela AS es
						ON al.es_a=es.escuela
						
						
						
						
						ORDER BY id_acta ASC
						";	?>
				
				<tr>
					<td colspan="1"><a href="pdf/index.php"> Imprimir </a></td>
					<td colspan="5"><h1>CATALOGO DE TESIS</h1></td>
					
				</tr>
			</thead>
			<tbody>
				<tr>
					<td  bgcolor="orange">ID TESIS:</td>
					<td  bgcolor="orange" colspan="3">AUTOR: </td>
					<td  bgcolor="orange" colspan="2">ESCUELA: </td>
					<td  bgcolor="orange" colspan="1">ASESOR<br> METODOLOGICO:  </td>
					<td  bgcolor="orange" colspan="1">TUTOR<br> ACADEMICO:  </td>
					
					
				</tr>
				
						
							
				<?php
				$res=$conn->query($query);
				while($row=$res->fetch_assoc()){
                     if($row["id_tesis_te"]<=9){$num_acta="00".$row["id_tesis_te"];}
                       	elseif(($row["id_tesis_te"]>=10)||($row["id_tesis_te"]<=99)){$num_acta="0".$row["id_tesis_te"];}
						$ac = array($row['escuela'],$row['ao'],$row['semestre'],$num_acta);
                        $acta  = implode("",$ac );
					?>
					<tr>
					
                   	<td rowspan="2"><?php echo $acta;?></td>
					<td colspan="3"><?php echo $row['ced_tesis'];?><br><?php echo $row['nom_tesis'];?></td>
					<td COLspan="2"><?php echo utf8_encode($row['descripcion'])?></td>
					<td colspan="1"><?php echo "V- ".$row['ced_tutor_met' ]?><br><?php echo $row['nom_tutor_met' ];?></td>
					<td colspan="1"><?php echo "V- ".$row['ced_tutor_acad' ]?><br><?php echo $row['nom_tutor_acad' ];?></td>
					
					
					
					</tr>
					<tr>
					<td  bgcolor="orange" class="letra">TITULO: </td>
					<td colspan="7"><?php echo $row['titulo_tesis'];?></td>
					</tr>
					<td colspan="9" bgcolor="orange"></td>
					
                   
					</tr>

					

					
					<?php
				}?>			
						
			</tbody>
		</table>
		</article>
	</center>
</body>
</html>
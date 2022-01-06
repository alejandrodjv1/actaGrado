<?php
session_start();
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:index.php");
}
 echo 'Sesion  de   '.$_SESSION['nombre'];
?>

<DOCTYPE html>
<html lang="es">
<head>
	<title>Formulario</title>
	<meta charset="utf-8">
    
     <link href="../css/estilos3.css" rel="stylesheet" type="text/css" />
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
    <nav class="navegacion">
        <ul class="menu">
           	<li><a href="../escuela/tabla.php"      class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
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
             <li><a href="tabla.php"                 class="bla"> Seguridad</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
        </nav>
	<center>
		<article ><br>
		<table  align="center" border="3" class="caja2">
			<thead>
				<tr>
					<td colspan="1"><a href="formulario.php"> Agregar </a><br>
									
					<td colspan="5"><h1>Listado de Usuarios</h1></td>
					<td colspan="7"><center>
										<form action="operacion_buscar.php" method="POST">
											<table>
												<tr><a>Cedula del Usuario :</a><td>
													<SELECT name="id">
														<?php
														 include("conexion.php");
		                       							 $conn=conectar();
															$query1="SELECT * FROM usuario";
															$res1=$conn->query($query1);
															echo"<option>".""."</option>";
																$datos_usuario=$row["id"];
															while($row1=$res1->fetch_assoc()){
																$id=$row1['id'];
																$ced_u=$row1['ced_usuario'];
																if($dato_usuario["id"]==$id){
																	echo "<option value='".$ced_u."'selected='selected'>".utf8_encode($ced_u)."</option>";
																}
																else {
															            echo "<option value='".$ced_u."'>".utf8_encode($ced_u)."</option>";
															        }
															}
														?>
													</SELECT> 	<input type="hidden" name="nom_usuario" value="<?php echo $row['nom_usuario'];?>"/> 
															<td><input type="submit" class="letra"	value="Buscar"/>
												</tr>
											</table>
										</form>
									</center>
						</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td  bgcolor="orange">Id</td>
					<td  bgcolor="orange">Cedula</td>
					<td  bgcolor="orange">Nombre Completo</td>
					<td  bgcolor="orange">Rol</td>
					<td  bgcolor="orange">Usuario </td>
					<td  bgcolor="orange">Clave</td>
					<td  bgcolor="orange">Respuesta Secreta</td>

															
					<td  bgcolor="orange" colspan="6"> OPERACIONES  </td>
				</tr>
				<?php
					
										
					$query="SELECT * FROM usuario";
					$res=$conn->query($query);
					while($row=$res->fetch_assoc()){?>

						<tr>
							<td ><?php echo utf8_encode ($row['id']);?></td>
							<td ><?php echo utf8_encode ($row['ced_usuario']);?></td>
							<td ><?php echo utf8_encode ($row['nom_usuario']);?></td>
							<td ><?php echo utf8_encode ($row['rol']);?></td>
							<td ><?php echo utf8_encode ($row['usuario']);?></td>
							<td ><?php echo utf8_encode ($row['clave']);?></td>
							<td ><?php echo utf8_encode ($row['resp_secreta']);?></td>
									
							<td colspan="5"><a href="modificar.php?id=<?php echo $row['id'];?>">Modificar</a></td>
							<td colspan="5"><a href="eliminar.php?id=<?php echo $row['id'];?>">Eliminar</a></td>
						</tr><?php
					}
				?>

			</tbody>
		</table>
		</article>
	</center>
</body>
</html>

<?php
    session_start();
    error_reporting(0);
    if(isset($_SESSION['rol'])){
       echo 'Sesion  de   '.$_SESSION['nombre'];}
    else{
        echo 'no tienes session';}
?>
<DOCTYPE html>
<html>
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
            <<table>
                <tr>
                    <td ><img src="../imagenes/L.png" alt="Logo" ></td>
                </tr>
            </table>
        </div>
    </header>
   <nav class="navegacion">
        <ul class="menu">
            <li><a href="tabla.php"                 class="bla"> Escuela</a></li>
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
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
             <li><a href="../usuarios/tabla.php"                 class="bla"> Seguridad</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
        </nav>

                    <?php
                        $escuela=$_REQUEST['escuela'];

                        include("conexion.php");
                        $conn=conectar();

                        $query="SELECT * 
                                FROM escuela
                                WHERE escuela='$escuela'
                                ";
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

	<center>
		<section class="row">
                <article >
                    <h1>Datos de la Escuela</h1>
                    <table  align="center" border="3" class="caja2">
                        <form >
                            <tr>
                                <td ><label>ESCUELA:</label></td>
                                <td colspan="4"><input type="text" REQUIRED name="escuela" 
                                    placeholder="solo numeros..." value="<?php echo $row['escuela'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>NOMBRE:</label></td>
                                <td colspan="4"><input type="text" REQUIRED name="descripcion" 
                                    placeholder="solo letras..." value="<?php echo $row['descripcion'];?>"/><br><br></td>
                            </tr>
                            
                            
                            <td ><a href="modificar.php?escuela=<?php echo $row['escuela'];?>">Modificar</a></td>
                            <td ><a href="eliminar.php?escuela=<?php echo $row['escuela'];?>">Eliminar</a></td>
                            <td ><a href="tabla.php">Regresar</a></td>
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
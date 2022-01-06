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
            <table>
                <tr>
                    <td><img src="../imagenes/L.png" alt="Logo" width="700px"></td>
                </tr>
            </table>
        </div>
    </header>
    <nav class="navegacion">
        <ul class="menu">
            <li><a href="../index.html"             class="bla"> Inicio</a></li>
            <li><a href="../escuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="tabla.php"                 class="bla"> Profesor</a></li>
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
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
		<section class="row">
                <article >
                    <h1 class="titulo">Datos del Profesor</h1>
                    <?php
                        $ci_p=$_REQUEST['ci_p'];

                        include("conexion.php");
                        $conn=conectar();
                       
                        $query="SELECT * 
                                FROM profesor 
                                WHERE ci_p='$ci_p'
                                ";
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>
                    

                    <table  align="center" border="2px" class="caja2">
                        <form >
                            <tr>
                                <td><label >Cedula:</label></td>
                                <td><input type="text" readonly name="ci_p" placeholder=" " 
                                    value="<?php echo $row['ci_p'];?>" minlength="7" maxlength="10" required pattern="[0-9,.]+"
                                    title="solo números. Tamaño mínimo: 7. Tamaño máximo: 10"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombre:</label></td>
                                <td><input type="text" readonly name="nom_p" value="<?php echo $row['nom_p'];?>"
                                    minlength="5" maxlength="40" required pattern="[A-Za-z, ]*"
                                     title="solo Letras. mínimo: 5 letras. máximo: 40 letras"/><br></td>
                            </tr>
                            
                            
                            <tr>
                                <td><label>Escuela :</label></td>
                                <td><input type="text" readonly name="es_p" value="<?php echo $row['es_p'];?>"
                                        list="es_p" minlength="2" maxlength="2" required pattern="(41|42|43|44|45|46|47|48|49|50|51)"
                                        title="Numeros del 41 al 51."/></td>
                            </tr>
                            <tr>
                                <td><label>Estatus :</label></td>
                                <?php if($row['activo']==1)$activo="Activo";
                                        elseif($row['activo']==0)$activo="Inactivo";?>
                                <td><input type="text" readonly name="activo" placeholder="<?php echo $activo;?>" value="<?php echo $activo;?>"/><br/></td>
                            </tr>
                            
                            
                            <td><a href="modificar.php?ci_p=<?php echo $row['ci_p'];?>&es_p=<?php echo $row['es_p'];?>">Modificar</a>
                            <a href="eliminar.php?ci_p=<?php echo $row['ci_p'];?>">Eliminar</a></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
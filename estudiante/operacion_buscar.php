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
	<title>Oper_buscar</title>
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
            <li><a href="../escuela/tabla.php"      class="bla"> Escuela</a></li>
            <li><a href="tabla.php"   class="bla"> Estudiante</a></li>
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

	<center>
		<section class="row">
                <article >
                    <h1>Datos del Estudiante</h1>
                    <?php
                        $ci_a=$_REQUEST['ci_a'];

                        include("conexion.php");
                        $conn=conectar();

                        $query="SELECT * 
                                FROM alumno 
                                WHERE ci_a='$ci_a'
                                ";
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

                    <table align="center" border="2px" class="caja2">
                        <form >
                            <tr>
                                <td><label>Cedula::</label></td>
                                <td><input type="text" readonly name="ci_a" placeholder="<?php echo $row['ci_a'];?>..." value="<?php echo $row['ci_a'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombre:</label></td>
                                <td><input type="text" readonly name="nom_a" placeholder="<?php echo $row['nom_a'];?>" value="<?php echo $row['nom_a'];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>Escuela:</label></td>
                                <td><input type="text" readonly name="es_a" placeholder="<?php echo $row['nom_a'];?>" value="<?php echo $row['es_a'];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>Materia Pendiente:</label></td>
                                <td><input type="text" readonly name="mat_pend" placeholder="<?php echo $row['mat_ped'];?>" value="<?php echo $row['mat_pend'];?>"/>
                                 </td>   
                            </tr>
                            <tr>
                                <td><label>Titulo<br>Proyecto:</label></td>
                                <td><input type="text" readonly name="titulo_tesis_al" placeholder="" 
                                    value="<?php echo $row['titulo_tesis'];?>"
                                    minlength="5" maxlength="1000" required pattern="[A-Za-z0-9, ]*"
                                     title="solo Letras. mínimo: 5 letras. máximo: 1000 letras"/><br></td>
                            </tr>
                            <tr>
                                <td><label>Nota Proyecto :</label></td>
                                <td><input type="text" readonly name="nota_proy" placeholder="<?php echo $row['nota_proy'];?>" value="<?php echo $row['nota_proy'];?>"/>
                                </td>
                            </tr>

                            <td><a href="modificar.php?ci_a=<?php echo $row['ci_a'];?>">Modificar</a>
                            <a href="eliminar.php?ci_a=<?php echo $row['ci_a'];?>">Eliminar</a></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
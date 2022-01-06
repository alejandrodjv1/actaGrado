<?php
session_start();
error_reporting(0);
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?>
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
                         $es_p=$_REQUEST['es_p'];

                        include("conexion.php");
                        $conn=conectar();

                        $query="SELECT  *
                                FROM profesor AS pr
                                INNER JOIN escuela AS es 
                                ON pr.es_p = $es_p
                                WHERE ci_p='$ci_p'
                                ";
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

                    <table  align="center" border="2px" class="caja2">
                        <form action="operacion_modificar.php" method="POST">
                            <tr>
                                <td><label>Cedula:</label></td>
                                <td><input type="text" readonly name="ci_p" placeholder=" " 
                                    value="<?php echo $row['ci_p'];?>" minlength="7" maxlength="10" required pattern="[0-9,.]+"
                                    title="solo números. Tamaño mínimo: 7. Tamaño máximo: 10"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombres<br>Apellidos:</label></td>
                                <td><input type="text" name="nom_p" placeholder="" 
                                    value="<?php echo $row['nom_p'];?>" minlength="5" maxlength="40" required pattern="[A-Za-z, ]*"
                                     title="solo Letras. mínimo: 5 letras. máximo: 40 letras"/><br></td>
                            </tr>
                            
                            <tr>
                                <tr>
                                <td><label>Escuela :</label></td>

                                <td><input type="text" name="es_p" placeholder="<?php echo $row['es_p'];?>"
                                                value="<?php echo $row['es_p'];?>" list="es_p"
                                                minlength="2" maxlength="2" required pattern="(41|42|43|44|45|46|47|48|49|50|51)"
                                        title="Numeros del 41 al 51."/ >
                                        <datalist id="es_p">
                                        <option value="41">Arquitectura </option>
                                        <option value="42">Ing. Civil </option>
                                        <option value="43">Ing. Electrica </option>
                                        <option value="44">Ing. Electronica </option>
                                        <option value="45">Ing. Industrial </option>
                                        <option value="46">Ing. Mant Mec. </option>
                                        <option value="47">Ing. de Sistemas </option>
                                        <option value="48">Ing. de Diseño Industrial </option>
                                        <option value="49">Ing. Quimica </option>
                                        <option value="50">Ing. de Petroleos </option>
                                        <option value="51">Ing. Agronomica </option>
                                    </datalist><br>
                                </td>
                            </tr>
                            
                            <tr>
                                <td><label>ESTATUS:</label></td>
                                <td><label>Activo:</label>
                                <input type="radio" name="activo" value="1" ><br>
                                <label>Inactivo:</label>
                                <input type="radio" name="activo" value="0"><br>
                            </tr>
                            

                            <td ><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>

                            
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
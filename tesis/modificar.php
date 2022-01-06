<!DOCTYPE html>
<html>
<head>
	<title>Formulario Modificar</title>
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
            <li><a href="../sescuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="tabla.php"                 class="bla"> Tesis</a></li>
            <li><a href="../jurado_1/tabla.php"                 class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="../acta/tabla.php"         class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../index.html"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
		<section class="row">
                <article >
                    <h1>Modificar<br>Datos de las Tesis</h1>
                     <?php
                        $id_tesis=$_REQUEST['id_tesis_te'];
                        $ced_tesis   =$_REQUEST['ced_tesis'];

                        include("conexion.php");
                       $query="SELECT  
                        *
                        FROM tesis AS te     
                        
                        INNER JOIN alumno AS al
                        ON te.ced_tesis=al.ci_a
                       
                        INNER JOIN  tutor_met AS tu_met
                        ON te.id_tutor_met=tu_met.id_tu_met
                        INNER JOIN  tutor_acad AS tu_acad
                        ON te.id_tutor_acad=tu_acad.id_tu_acad
                        INNER JOIN profesor AS pr
                        ON tu_met.ced_tutor_met=pr.ci_p
                        INNER JOIN profesor AS pr1
                        ON tu_acad.ced_tutor_acad=pr1.ci_p
                        
                        INNER JOIN escuela AS es
                        ON al.es_a=es.escuela
                        WHERE te.id_tesis_te=$id_tesis
                        AND te.ced_tesis=$ced_tesis
                       
                        ORDER BY te.id_tesis_te ASC
                        ";
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();  ?>
               

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_modificar.php" method="POST">
                            <tr>
                                <td><label>Codigo de Tesis:</label></td>
                                <td><input type="text" name="id_tesis_te" placeholder="" 
                                    value="<?php echo $row['id_tesis_te'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label bgcolor="orange">Cedula:</label></td>
                                <td><input type="text" name="ced_tesis" placeholder="" 
                                    value="<?php echo $ced_tesis;?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombres<br>Apellidos:</label></td>
                                <td><input type="text" name="nom_tesis" placeholder="" 
                                    value="<?php echo $row['nom_tesis'];?>"/><br></td>
                            </tr>
                            
                             <tr>
                                <tr>
                                <td><label>Escuela :</label></td>
                                                            
                                <td>
                                    <input type="text" name="es_tesis" placeholder="" 
                                            value="<?php echo $row['es_tesis'];?>"list="es_tesis"/>
                                    <datalist id="es_tesis">
                                        <option value=""> </option>
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
                            <tr><td><label>Titulo de la Tesis :</label></td>
                                    <td><input type="text" name="titulo_tesis" placeholder="" 
                                        value="<?php echo utf8_encode($row['titulo_tesis']);?>"/><br></td>
                            </tr>
                            
                            
                            <tr>
                                <td><label>ASESOR<br> METODOLOGICO:<br><a href="formulario_mod_met_tesis.php?ced_tutor_met=<?php echo $row['ced_tutor_met'];?>&id_tesis_te=<?php echo $id_tesis;?>&ced_tesis=<?php echo $ced_tesis;?>">Buscar</a>  </td>
                                <td><input type="text" name="ced_tutor_met" placeholder="" 
                                    value="<?php echo $row['ced_tutor_met'];?>"/><br>
                                    <input type="text" name="nom_tutor_met" placeholder="" 
                                    value="<?php echo $row['nom_tutor_met'];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>TUTOR <br> ACADEMICO:<br>   <a href="formulario_mod_acad_tesis.php?ced_tutor_acad=<?php echo $row['ced_tutor_acad'];?>&id_tesis_te=<?php echo $id_tesis;?>&ced_tesis=<?php echo $ced_tesis;?>">Buscar</a>  </td>
                               <td><input type="text" name="ced_tutor_acad" placeholder="" 
                                    value="<?php echo $row['ced_tutor_acad'];?>"/><br>
                                    <input type="text"  name="nom_tutor_acad" placeholder="" 
                                    value="<?php echo $row['nom_tutor_acad'];?>"/><br></td>
                            </tr>
                            
                            <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>
                            
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
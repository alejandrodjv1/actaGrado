<?php
$id_acta =$_GET['id_acta'];
$nota_ac =$_GET['nota_ac'];
$id_menc =$_GET['id_menc'];
$ced_tesis=$_GET['ced_tesis'];
?>
<DOCTYPE html>
<html>
<head>
	<title>Formulario Agregar Nota</title>
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
        <article ><br>
        <table  align="center" border="3" class="caja2">
            <thead>
                <tr>
                    
                    <td colspan="6"><h1>Agregar Nota </h1></td>
                   
                </tr>
            </thead>
            <tbody>
                
                <?php
                    
                    
                     include("conexion.php");
                        $query="SELECT *
                        FROM  acta AS ac
                        INNER JOIN tesis AS te
                        ON ac.id_tesis=te.id_tesis_te
                        INNER JOIN alumno AS al
                        ON te.ced_tesis=al.ci_a
                        INNER JOIN  tutor_met AS tu_met
                        ON te.id_tutor_met=tu_met.id_tu_met
                        INNER JOIN  tutor_acad AS tu_acad
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
                        ";
                    $res=$conn->query($query);
                    $row=$res->fetch_assoc()
                ?> <table align="center" border="2px" class="caja2">
                        <form action="operacion_agregar_nota.php" method="POST">
                            <tr>
                                <td><label>Codigo de Tesis:</label></td>
                                <td><input type="text" name="id_acta" placeholder="" 
                                    value="<?php echo $id_acta;?>"><br></td>
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
                                    <input type="text" name="es_tesis" placeholder="<?php echo $row['es_tesis'];?>" 
                                            value="<?php echo $row['es_tesis'];?>"list="es_tesis"/>
                                    <datalist id="es_tesis">
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
                             <tr>
                                <tr><td><label>Nota :</label></td>
                                    <td><input type="text"  name="nota_ac" placeholder="<?php echo $row['nota_ac'];?>"
                                        value="<?php echo $row['nota_ac'];?>" list="nota_ac"/>
                                        <datalist id="nota_ac">
                                            <option value="Uno (01)">   </option>
                                            <option value="Dos (02)">   </option>
                                            <option value="Tres (03)">  </option>
                                            <option value="Cuatro (04)"></option>
                                            <option value="Cinco (05)"> </option>
                                            <option value="Seis (06)">  </option>
                                            <option value="Siete (07)"> </option>
                                            <option value="Ocho (08)">  </option>
                                            <option value="Nueve (09)"> </option>
                                            <option value="Diez (10)">  </option>
                                            <option value="Once (11)">  </option>
                                            <option value="Doce (12)">  </option>
                                            <option value="Trece (13)"> </option>
                                            <option value="Catorce (14)">   </option>
                                            <option value="Quince (15)">    </option>
                                            <option value="Dieciseis (16)"> </option>
                                            <option value="Diecisite (17)"> </option>
                                            <option value="Dieciocho (18)"> </option>
                                            <option value="Diecinueve (19)"></option>
                                            <option value="Veinte (20)">    </option>
                                        </datalist><br>
                                    </td>
                                </tr>
                              <tr>
                                <tr><td><label>Mencion de la Tesis :</label></td>
                                    <td><input type="text" name="id_menc" placeholder="<?php echo $row['id_menc'];?>"
                                        value="<?php echo $row['id_menc'];?>"list="id_menc"/>
                                        <datalist id="id_menc">
                                            <option value="1">Honorifica  </option>
                                            <option value="2">Publicacion</option>
                                            <option value="3">Honorifica y Publicacion</option>
                                            <option value="4">Sin mencion Aprobado </option>
                                        </datalist><br>
                                    </td>
                                </tr>
                           
                            <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            <td><a href="tabla.php">Regresar</a></td></tr>
                            
                                                   
                        </form>
                    </table>
               
            </tbody>
        </table>
        </article>
    </center>
</body>
</html>
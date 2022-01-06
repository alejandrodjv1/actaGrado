<!DOCTYPE html>
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
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
            <li><a href="../jurado/tabla.php"       class="bla"> Jurado</a></li>
            <li><a href="tabla.php"                 class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../index.html"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
		<section class="row">
                <article>
                    <table  align="center" border="3px" class="caja2">
                        <form action="operacion_modificar.php" method="POST">
                            <h1>Datos del Acta</h1>
                            <?php
                            $id_acta=$_REQUEST['id_acta'];

                            include("conexion.php");
                            $conn=conectar();
                         
                            // Consulta para obtener nombre del primer jurado
                            $query="SELECT   pr.nom_p,pr.ci_p
                            FROM    jurado_1 AS ju1
                            INNER JOIN profesor AS pr 
                            ON ju1.ci_jur_1=pr.ci_p";
                            $res=$conn->query($query);
                            while($row=$res->fetch_assoc()){
                                $nom_p1=$row["nom_p"];
                                $ci_jur_1=$row['ci_p'];
                            }

                            // Consulta para obtener nombre del segundo jurado
                            $query="SELECT    pr.nom_p,pr.ci_p
                            FROM    jurado_2 AS ju2
                            INNER JOIN profesor AS pr
                            ON ju2.ci_jur_2=pr.ci_p";
                            $res=$conn->query($query);
                            while($row=$res->fetch_assoc()){
                                $nom_p2=$row["nom_p"];
                                $ci_jur_2=$row['ci_p'];
                            }

                            // Consulta para obtener nombre del tercer jurado
                            $query="SELECT    pr.nom_p,pr.ci_p
                            FROM    jurado_3 AS ju3
                            INNER JOIN profesor AS pr 
                            ON ju3.ci_jur_3=pr.ci_p";
                            $res=$conn->query($query);
                            while($row=$res->fetch_assoc()){
                                $nom_p3=$row["nom_p"];
                                $ci_jur_3=$row['ci_p'];
                            }
                            $query="SELECT pr.nom_p,pr.ci_p
                                    FROM  tutor_met AS tu_met 
                                    INNER JOIN profesor AS pr
                                    ON tu_met.ced_tutor_met=pr.ci_p ";
                            $res=$conn->query($query);
                            while($row=$res->fetch_assoc()){
                                $nom_p_tu_met=$row["nom_p"];
                                $ced_tu_met=$row["ci_p"];
                            }
                            $query="SELECT pr.nom_p,pr.ci_p
                                    FROM  tutor_acad AS tu_acad 
                                    INNER JOIN profesor AS pr
                                    ON tu_acad.ced_tutor_acad=pr.ci_p   ";
                            $res=$conn->query($query);
                            while($row=$res->fetch_assoc()){
                                    $nom_p_tu_acad=$row["nom_p"];
                                    $ced_tu_acad=$row["ci_p"];
                            }
                            
                            $query="SELECT fe.fecha_pre,fe.fecha_def,fe.hora_pre,fe.hora_def,fe.semestre,fe.ao
                                            FROM tesis AS te3
                                            INNER JOIN fecha AS fe
                                            ON te3.id_fecha_te=fe.id_fecha";
                                            $res=$conn->query($query);
                                            while($row=$res->fetch_assoc()){
                                            
                                            $f=explode('-',$row['fecha_def']);
                                            $fecha_present=$f[2]."/".$f[1]."/".$f[0];
                                            $dia=$f[2]; $anio=$f[0]; $ao=$f[0]-2000;
                                            if($f[1]==1)$mes='enero';
                                                elseif($f[1]==2)$mes='febrero';
                                                    elseif($f[1]==3)$mes='marzo';
                                                        elseif($f[1]==4)$mes='abril';
                                                            elseif($f[1]==5)$mes='mayo';
                                                                elseif($f[1]==6)$mes='junio';
                                                                    elseif($f[1]==7)$mes='julio';
                                                                        elseif($f[1]==8)$mes='agosto';
                                                                            elseif($f[1]==9)$mes='septiembre';
                                                                                elseif($f[1]==10)$mes='octubre';
                                                                                    elseif($f[1]==11)$mes='noviembre';
                                                                                        elseif($f[1]==12)$mes='diciembre';
                                            $h=explode(':',$row['hora_def']);
                                            $hora_present=$h[0].":".$h[1];
                                            
                                        }
                            // Consulta para obtener resto de datos del acta
                            $query="SELECT * 
                                    FROM acta AS ac
                                    INNER JOIN mencion AS me
                                    ON ac.id_menc=me.id_menc
                                    INNER JOIN tesis AS te
                                    ON ac.id_tesis=te.id_tesis_te
                                                            
                                    
                                    INNER JOIN alumno AS al 
                                    ON te.ced_tesis=al.ci_a
                                    INNER JOIN escuela AS es 
                                    ON al.es_a=es.escuela ";
                            $res=$conn->query($query);
                            $row=$res->fetch_assoc();
                            ?>

                            <tr>
                                <td><label>Codigo del Acta:</label></td>
                                <td><input type="text" REQUIRED name="id_acta" placeholder="solo numeros..." value="<?php echo $row['id_acta'];?>"><br></td>
                            </tr>
                            <tr>
                                <td><label>Codigo de Tesis:</label></td>
                                <td><input type="text" REQUIRED name="<?php echo $row['id_tesis_te'];?>" placeholder="solo letras..." value="<?php echo $row['id_tesis_te'];?>"/><br></td>
                            </tr>
                            <tr>
                                <td><label>Autor:</label><td>
                                <input type="text" REQUIRED name="<?php echo $row['ci_a'];?>" placeholder="<?php echo $row['ci_a'];?>"  value="<?php echo $row['ci_a'];?>"/><br>
                                <input type="text" REQUIRED name="<?php echo $row['nom_a'];?>" placeholder="<?php echo $row['ci_a'];?>" value="<?php echo $row['nom_a'];?>"/></td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <tr><td><label>Mencion de la Tesis :</label></td>
                                    <td><input type="text" REQUIRED name="id_menc" placeholder="<?php echo $row['id_menc'];?>"list="<?php echo $row['id_menc'];?>"/>
                                        <datalist id="<?php echo $row['id_menc'];?>">
                                            <option value=""></option>
                                            <option value="1">1.-Honorifica  </option>
                                            <option value="2">2.-Publicacion</option>
                                            <option value="3">3.-Honorifica y Publicacion</option>
                                            <option value="4">4.-Aprobado </option>
                                        </datalist><br>
                                    </td>
                                </tr>

                            <tr>
                                <tr><td><label>Nota :</label></td>
                                    <td><input type="text"  REQUIRED name="nota_ac" placeholder="<?php echo $row['nota_ac'];?>"list="<?php echo $row['nota_ac'];?>"/>
                                        <datalist id="<?php echo $row['nota_ac'];?>">
                                            <option value=""></option>
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
                                <td><a href="tabla.php">Regresar</a></td>
                                <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            </tr>
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
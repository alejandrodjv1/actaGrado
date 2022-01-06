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
           <nav class="navegacion">
        <ul class="menu">
           <li><a href="../escuela/tabla.php"       class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="tabla.php"                 class="bla"> Tesis</a></li>
            <li><a                                  class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="../acta/tabla.php"         class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../usuarios/tabla.php"      class="bla"> Seguridad</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
        
            <article >
                <table align="center" border="2px" class="caja2">
                    <thead>
                        <?php 
                        $ced_tesis=$_POST['ced_tesis'];
                          
                              
                include("conexion.php");
                $query="SELECT  
                        *
                        FROM tesis AS te
                        INNER JOIN alumno AS al
                        ON te.ced_tesis=al.ci_a
                        INNER JOIN mencion AS me
                        ON te.id_menc=me.id_menc
                       
                        INNER JOIN  tutor_met AS tu_met
                        ON te.id_tutor_met=tu_met.id_tu_met
                        INNER JOIN  tutor_acad AS tu_acad
                        ON te.id_tutor_acad=tu_acad.id_tu_acad
                         INNER JOIN jurado_1 AS ju1
                        ON te.id_jurado_1=ju1.id_jurado_1
                        INNER JOIN jurado_2 AS ju2
                        ON te.id_jurado_2=ju2.id_jurado_2
                         INNER JOIN jurado_3 AS ju3
                        ON te.id_jurado_3=ju3.id_jurado_3
                        
                        
                        INNER JOIN escuela AS es
                        ON al.es_a=es.escuela
                        INNER JOIN fecha AS fe
                        ON te.id_fecha_te=fe.id_fecha
                        WHERE ced_tesis=$ced_tesis
                        
                                                 
                        ORDER BY te.id_tesis_te ASC
                        ";
                        //while($row=$res->fetch_assoc()){
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                        
                        $f=explode('-',$row['fecha_def']);
                       $dia=$f[2]; $mes=$f[1]; $anio=$f[0];$ao=$f[0]-2000;
                    
                            
                                    ?>
                        <tr>
                            <td colspan="1"><a href="pdf/buscado_cedula.php?ced_tesis=<?php echo $_POST['ced_tesis'];?>"> Imprimir </a></td>
                            <td colspan="6"><h1>CATALOGO DE TESIS</h1></td>
                            <td colspan="2"><center>
                                                <form action="operacion_buscar.php" method="POST">
                                                    <table>
                                                        <tr>Cedula tesista:<br><input type="hidden" name="id_tesis_te" 
                                                            placeholder="" value=""/>
                                                            <input type="text" REQUIRED name="ced_tesis" 
                                                            placeholder=" solo numeros..." value=""/>
                                                        </tr>       <input type="submit" value="Buscar"/>
                                                       </tr>
                                                    </table>
                                                </form>
                                                <form action="tabla_escuela.php" method="POST">
                                                    <table>
                                                        <tr>Listar por Escuela:<br><input type="hidden" name="id_tesis_te" 
                                                            placeholder="" value=""/>
                                                            <input type="text" REQUIRED name="escuela" 
                                                            placeholder=" solo numeros..." value=""/>
                                                        </tr>       <input type="submit" value="Buscar"/>
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
                            <td  bgcolor="orange" colspan="1">PRIMER<br> JURADO: </td>
                            <td  bgcolor="orange" colspan="1">SEGUNDO<br> JURADO:  </td>
                            <td  bgcolor="orange" colspan="1">TRECER <br> JURADO:  </td>
                            
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
                            <td colspan="1"><?php echo $row['ced_tesis'];?><br><?php echo $row['nom_tesis'];?></td>
                            <td COLspan="2"><?php echo utf8_encode($row['descripcion'])?></td>
                            <td colspan="1"><?php echo "V- ".$row['ced_tutor_met' ]?><br><?php echo $row['nom_tutor_met' ];?></td>
                            <td colspan="1"><?php echo "V- ".$row['ced_tutor_acad' ]?><br><?php echo $row['nom_tutor_acad' ];?></td>
                            <td colspan="1"><?php echo "V- ".$row['ci_jur_1' ]?><br><?php echo $row['nom_ju_1' ];?></td>
                            <td colspan="1"><?php echo "V- ".$row['ci_jur_2' ]?><br><?php echo $row['nom_ju_2' ];?></td>
                            <td colspan="1"><?php echo "V- ".$row['ci_jur_3' ]?><br><?php echo $row['nom_ju_3' ];?></td>
                            
                                
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
        
	<center>
</body>
</html>
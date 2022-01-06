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
            <li><a href="tabla.php"                 class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
            <li><a href="../jurado/tabla.php"       class="bla"> Jurado</a></li>
            <li><a href="../acta/tabla.php"         class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../index.html"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
		<section class="row">
               <article >
                    <h1>Agregar Fecha a la<br> Presentacion de Tesis</h1>
                    <?php
                        $id_fecha=$_REQUEST['id_fecha'];

                        include("conexion.php");
                        $conn=conectar();

                        $query="SELECT *
                            FROM tesis AS te
                            INNER JOIN fecha AS fe
                            te.id_fecha_te!=fe.id_fecha
                            WHERE te.id_fecha_te=0
                            ORDER BY id_fecha ASC
                            ";
                       
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                        $f=explode('-',$row['fecha_pre']);
                        $dia=$f[2];$mes=$f[1];$ao=$f[0];
                        $fecha_def  = array($dia,$mes,$ao);
                        $fecha_def  = implode("/",$fecha_def );

                        $h=explode(':',$row['hora_pre']);
                        $hora=$h[0];$minutoss=$h[1];
                        $min=explode(" ",$minutoss);
                        $minutos=$min[0];
                        $am_pm=$min[1];

                         $f=explode('-',$row['fecha_pre']);
                        $dia=$f[2];$mes=$f[1];$ao=$f[0];
                        $fecha_def  = array($dia,$mes,$ao);
                        $fecha_def  = implode("/",$fecha_def );

                        $h=explode(':',$row['hora_def']);
                        $hora=$h[0];$minutoss=$h[1];
                        $min=explode(" ",$minutoss);
                        $minutos=$min[0];
                        $am_pm=$min[1];
                    ?>

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_agregar_fecha.php" method="POST">
                            
                            <tr>
                                <td bgcolor="orange">Id:
                                    <input type="text" name="id_fecha" placeholder="" 
                                    value="<?php echo $row['id_fecha'];?>"><br>
                                <td> </td>
                                <td bgcolor="orange">AULA:</td>
                            </tr>
                            <tr>
                                <td bgcolor="orange">Fecha Predefensa:
                                <td><input type="text" name="fecha_pre" placeholder="" 
                                    value="<?php echo $row['fecha_pre'];?>">
                                    <input type="text" name="hora_pre" placeholder="" 
                                    value="<?php echo $row['hora_pre'];?>"></td>
                                <td><input type="text" name="aula_pre" placeholder="" 
                                    value="<?php echo $row['aula_pre'];?>"></td>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="orange">Fecha Defensa:
                                <td><input type="text" name="fecha_pre" placeholder="" 
                                    value="<?php echo $row['fecha_pre'];?>">
                                    <input type="text" name="hora_def" placeholder="" 
                                    value="<?php echo $row['hora_def'];?>"></td>
                                <td><input type="text" name="aula_def" placeholder="" 
                                    value="<?php echo $row['aula_def'];?>"></td>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Semestre:</label></td>
                                <td><input type="text" name="semestre" placeholder="" 
                                    value="<?php echo $row['semestre'];?>"/><br></td>
                                <td></td>
                            </tr><td></td>
                            
                                
                            
                            <td><a href="formulario_fecha.php">Regresar</a></td></td>
                            <td ><input type="submit" name="Aceptar" value="Aceptar"></tr>
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
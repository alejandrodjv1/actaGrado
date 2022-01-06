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
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="../fecha/tabla.php"        class="bla"> Fechas</a></li>
            <li><a href="../tesis/tabla.php"        class="bla"> Tesis</a></li>
           <li><a href="../jurado_1/tabla.php"      class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="tabla.php"                 class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../usuarios/tabla.php"                 class="bla"> Seguridad</a></li>
            <li><a href="../index.php"             class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
		
               <article >
                    <h1>Agregar Fecha a la<br> Presentacion de Tesis</h1>
                    <?php
                        $id_fecha=$_REQUEST['id_fecha'];
                        
                        $id_acta=$_REQUEST['id_acta'];

                        include("conexion.php");
                        $conn=conectar();

                       $query="SELECT *
                            FROM  fecha AS fe
                           
                            WHERE estatus_fecha_tesis=0
                            AND id_fecha=$id_fecha
                            ORDER BY id_fecha ASC
                            ";
                       
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                        $f=explode('-',$row['fecha_pre']);
                        $dia=$f[2];$mes=$f[1];$ao=$f[0];
                        $fecha_pre  = array($dia,$mes,$ao);
                        $fecha_pre = implode("/",$fecha_pre );

                        $h=explode(':',$row['hora_pre']);
                        $hora=$h[0];$minutoss=$h[1];
                        $min=explode(" ",$minutoss);
                        $minutos=$min[0];
                        $am_pm=$min[1];

                         $f=explode('-',$row['fecha_def']);
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
                                <td><input type="text" name="fecha_def" placeholder="" 
                                    value="<?php echo $row['fecha_def'];?>">
                                    <input type="text" name="hora_def" placeholder="" 
                                    value="<?php echo $row['hora_def'];?>"></td>
                                <td><input type="text" name="aula_def" placeholder="" 
                                    value="<?php echo $row['aula_def'];?>"></td>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="hidden" name="semestre" placeholder="" 
                                    value="<?php echo $row['semestre'];?>"/><br></td>
                                    <td><input type="hidden" name="id_acta" placeholder="" 
                                    value="<?php echo $id_acta;?>"/><br></td>
                                    <td><input type="hidden" name="estatus_fecha_tesis" placeholder="" 
                                    value="<?php echo $row['estatus_fecha_tesis'];?>"/><br></td>
                               
                            </tr><td></td>
                                                       
                            <td><a href="formulario_fecha.php">Regresar</a></td></td>
                            <td ><input type="submit" name="Aceptar" value="Aceptar"></tr>
                                                   
                        </form>
                    </table>
                </article>
       
	</center>
</body>
</html>
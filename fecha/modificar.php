<?php
session_start();
error_reporting(0);
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?>
<?php
$id_fecha=$_REQUEST['id_fecha'];
$id_tesis_te=$_REQUEST['estatus_fecha_tesis'];
?><DOCTYPE html>
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
   <ul class="menu">
            <li><a href="../escuela/tabla.php"      class="bla"> Escuela</a></li>
            <li><a href="../estudiante/tabla.php"   class="bla"> Estudiante</a></li>
            <li><a href="../profesor/tabla.php"     class="bla"> Profesor</a></li>
            <li><a href="../tutor_met/tabla.php"    class="bla"> Asesor Metodologico</a></li>
            <li><a href="../tutor_acad/tabla.php"   class="bla"> Tutor Academico</a></li>
            <li><a href="tabla.php"        class="bla"> Fechas</a></li>
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
        
               <article >
                    <h1>Modificar Fecha de<br> Presentacion de Tesis</h1>
                    <?php

                        include("conexion.php");
                        $conn=conectar();

                        $query="SELECT * FROM fecha WHERE id_fecha=$id_fecha";
                       
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                        if (mysqli_num_rows($res) <1) {
                             header("Location: tabla.php");
                             $continuar=0;
                            $_SESSION['no_existe']=1;}
                         
                        $f=explode('-',$row['fecha_pre']);
                        $dia_p=$f[2];$mes_p=$f[1];$ao_p=$f[0];
                        $h=explode(':',$row['hora_pre']);
                        $hora_p=$h[0];$minutoss_p=$h[1];
                        $min_p=explode(" ",$minutoss_p);
                        $minutos_p=$min_p[0];
                        $am_pm_p=$min_p[1];
                        $aula_pre=$row['aula_pre'];

                        $query1="SELECT * FROM fecha WHERE id_fecha=$id_fecha";
                        $res1=$conn->query($query1);
                        $row=$res1->fetch_assoc();
                        $f1=explode('-',$row['fecha_def']);
                        $dia_d=$f1[2];$mes_d=$f1[1];$ao_d=$f1[0];
                        $h1=explode(':',$row['hora_def']);
                        $hora_d=$h1[0];$minutoss_d=$h1[1];
                        $min_d=explode(" ",$minutoss_d);
                        $minutos_d=$min_d[0];
                        $am_pm_d=$min_d[1];
                        $aula_def=$row['aula_def'];
                        
                        $semestre=$row['semestre'];
                    ?>

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_modificar.php" method="POST">
                            
                                <tr><td bgcolor="orange" colspan="2"> P R E D E F E N S A :</td><td></td><td bgcolor="orange" colspan="2"> D E F E N S A :</td></tr>
                                <tr><td><label>FECHA :</label></td>
                                    <td>
                                        <input type="text" name="dia_p" placeholder=""value="<?php echo $dia_p;?>" list="dia_p"
                                         minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                    title="solo números de dos digitos"><br>
                                         <datalist id="dia_p">
                                        <option value=""></option>
                                        <option value="01"> </option>
                                        <option value="02"> </option>
                                        <option value="03"> </option>
                                        <option value="04"> </option>
                                        <option value="05"> </option>
                                        <option value="06"> </option>
                                        <option value="07"> </option>
                                        <option value="08"> </option>
                                        <option value="09"> </option>
                                        <option value="10"> </option>
                                        <option value="11"> </option>
                                        <option value="12"> </option>
                                        <option value="13"> </option>
                                        <option value="14"> </option>
                                        <option value="15"> </option>
                                        <option value="16"> </option>
                                        <option value="17"> </option>
                                        <option value="18"> </option>
                                        <option value="19"> </option>
                                        <option value="20"> </option>
                                        <option value="21"> </option>
                                        <option value="22"> </option>
                                        <option value="23"> </option>
                                        <option value="24"> </option>
                                        <option value="25"> </option>
                                        <option value="26"> </option>
                                        <option value="27"> </option>
                                        <option value="28"> </option>
                                        <option value="29"> </option>
                                        <option value="30"> </option>
                                        <option value="31"> </option>
                                    </datalist>
                                        <input type="text" name="mes_p" placeholder=""value="<?php echo $mes_p;?>"list="mes_p"
                                         minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                    title="solo números de dos digitos"/>
                                    <datalist id="mes_p">
                                        <option value=""></option>
                                        <option value="01"> </option>
                                        <option value="02"> </option>
                                        <option value="03"> </option>
                                        <option value="04"> </option>
                                        <option value="05"> </option>
                                        <option value="06"> </option>
                                        <option value="07"> </option>
                                        <option value="08"> </option>
                                        <option value="09"> </option>
                                        <option value="10"> </option>
                                        <option value="11"> </option>
                                        <option value="12"> </option>
                                    </datalist><br>
                                    <input type="text" name="ao_p" placeholder=""value="<?php echo $ao_p;?>"list="ao_p"
                                     minlength="2" maxlength="4" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                    title="solo números de dos digitos"/>
                                    <datalist id="ao_p">
                                        <option value=""></option>
                                        <option value="2018"> </option>
                                        <option value="2019"> </option>
                                        <option value="2020"> </option>
                                        <option value="2021"> </option>
                                        <option value="2022"> </option>
                                        <option value="2023"> </option>
                                        <option value="2024"> </option>
                                        <option value="2025"> </option>
                                        <option value="2026"> </option>
                                        <option value="2027"> </option>
                                        <option value="2028"> </option>
                                        <option value="2029"> </option>
                                        <option value="2030"> </option>
                                        <option value="2031"> </option>
                                    </datalist><br>
                                    </td> 
                                                                        
                                    <td bgcolor="white"></td>
                                    <?php //FECHA DE DEFENSA DE TESIS?>
                                    <td><label>FECHA :</label></td>
                                   <td><input type="text" name="dia_d" placeholder=""value="<?php echo $dia_d;?>"list="dia_d"
                                     minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                    title="solo números de dos digitos"/>
                                    <datalist id="dia_d">
                                        <option value=""></option>
                                        <option value="01"> </option>
                                        <option value="02"> </option>
                                        <option value="03"> </option>
                                        <option value="04"> </option>
                                        <option value="05"> </option>
                                        <option value="06"> </option>
                                        <option value="07"> </option>
                                        <option value="08"> </option>
                                        <option value="09"> </option>
                                        <option value="10"> </option>
                                        <option value="11"> </option>
                                        <option value="12"> </option>
                                        <option value="13"> </option>
                                        <option value="14"> </option>
                                        <option value="15"> </option>
                                        <option value="16"> </option>
                                        <option value="17"> </option>
                                        <option value="18"> </option>
                                        <option value="19"> </option>
                                        <option value="20"> </option>
                                        <option value="21"> </option>
                                        <option value="22"> </option>
                                        <option value="23"> </option>
                                        <option value="24"> </option>
                                        <option value="25"> </option>
                                        <option value="26"> </option>
                                        <option value="27"> </option>
                                        <option value="28"> </option>
                                        <option value="29"> </option>
                                        <option value="30"> </option>
                                        <option value="31"> </option>
                                    </datalist><br>
                                    <input type="text" name="mes_d" placeholder=""value="<?php echo $mes_d;?>"list="mes_d"
                                     minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                    title="solo números de dos digitos"/>
                                    <datalist id="mes_d">
                                        <option value=""></option>
                                        <option value="01"> </option>
                                        <option value="02"> </option>
                                        <option value="03"> </option>
                                        <option value="04"> </option>
                                        <option value="05"> </option>
                                        <option value="06"> </option>
                                        <option value="07"> </option>
                                        <option value="08"> </option>
                                        <option value="09"> </option>
                                        <option value="10"> </option>
                                        <option value="11"> </option>
                                        <option value="12"> </option>
                                    </datalist><br>
                                   
                                    <input type="text"  name="ao_d" placeholder=""value="<?php echo $ao_d;?>"list="ao_d"
                                     minlength="2" maxlength="4" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                    title="solo números de cuatro digitos"/>
                                    <datalist id="ao_d">
                                        <option value=""></option>
                                        <option value="2018"> </option>
                                        <option value="2019"> </option>
                                        <option value="2020"> </option>
                                        <option value="2021"> </option>
                                        <option value="2022"> </option>
                                        <option value="2023"> </option>
                                        <option value="2024"> </option>
                                        <option value="2025"> </option>
                                        <option value="2026"> </option>
                                        <option value="2027"> </option>
                                        <option value="2028"> </option>
                                        <option value="2029"> </option>
                                        <option value="2030"> </option>
                                        <option value="2031"> </option>
                                    </datalist><br>
                                    </td> 
                                </tr>
                                <tr><td><label>HORA:</label></td>
                                   <td><input type="text" name="hora_p" placeholder=""value="<?php echo $hora_p;?>"list="hora_p"
                                     minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                    title="solo números de dos digitos"/>
                                        <datalist id="hora_p">
                                            <option value=""></option>
                                            <option value="01"> </option>
                                            <option value="02"> </option>
                                            <option value="03"> </option>
                                            <option value="04"> </option>
                                            <option value="05"> </option>
                                            <option value="06"> </option>
                                            <option value="07"> </option>
                                            <option value="08"> </option>
                                            <option value="09"> </option>
                                            <option value="10"> </option>
                                            <option value="11"> </option>
                                            <option value="12"> </option>
                                        </datalist><br>
                                        <input type="text" name="minutos_p" placeholder=""value="<?php echo $minutos_p;?>"list="minutos_p"
                                         minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                         title="solo números de dos digitos"/>
                                        <datalist id="minutos_p">
                                            <option value=""></option>
                                            <option value="00"> </option>
                                            <option value="01"> </option>
                                            <option value="02"> </option>
                                            <option value="03"> </option>
                                            <option value="04"> </option>
                                            <option value="05"> </option>
                                            <option value="06"> </option>
                                            <option value="07"> </option>
                                            <option value="08"> </option>
                                            <option value="09"> </option>
                                            <option value="10"> </option>
                                            <option value="11"> </option>
                                            <option value="12"> </option>
                                            <option value="13"> </option>
                                            <option value="14"> </option>
                                            <option value="15"> </option>
                                            <option value="16"> </option>
                                            <option value="17"> </option>
                                            <option value="18"> </option>
                                            <option value="19"> </option>
                                            <option value="20"> </option>
                                            <option value="21"> </option>
                                            <option value="22"> </option>
                                            <option value="23"> </option>
                                            <option value="24"> </option>
                                            <option value="25"> </option>
                                            <option value="26"> </option>
                                            <option value="27"> </option>
                                            <option value="28"> </option>
                                            <option value="29"> </option>
                                            <option value="30"> </option>
                                            <option value="31"> </option>
                                            <option value="32"> </option>
                                            <option value="33"> </option>
                                            <option value="34"> </option>
                                            <option value="35"> </option>
                                            <option value="36"> </option>
                                            <option value="37"> </option>
                                            <option value="38"> </option>
                                            <option value="39"> </option>
                                            <option value="40"> </option>
                                            <option value="41"> </option>
                                            <option value="42"> </option>
                                            <option value="43"> </option>
                                            <option value="44"> </option>
                                            <option value="45"> </option>
                                            <option value="46"> </option>
                                            <option value="47"> </option>
                                            <option value="48"> </option>
                                            <option value="49"> </option>
                                            <option value="50"> </option>
                                            <option value="51"> </option>
                                            <option value="52"> </option>
                                            <option value="53"> </option>
                                            <option value="54"> </option>
                                            <option value="55"> </option>
                                            <option value="56"> </option>
                                            <option value="57"> </option>
                                            <option value="58"> </option>
                                            <option value="59"> </option>
                                        </datalist><br>
                                                                            
                                        <input type="text" name="am_pm_p" placeholder=""value="<?php echo $am_pm_p;?>"list="am_pm_p"
                                         minlength="2" maxlength="2" required pattern="(am|pm)" autocomplete="off"
                                    title="solo am ó pm"/>
                                        <datalist id="am_pm_p">
                                            <option value=""></option>
                                            <option value="am"> </option>
                                            <option value="pm"> </option>
                                        </datalist><br>
                                    </td>
                                                                        
                                    <td bgcolor="white"></td>
                                    <?php //FECHA DE DEFENSA DE TESIS?>
                                    <td><label>HORA :</label></td>
                                    <td><input type="text" name="hora_d" placeholder=""value="<?php echo $hora_d;?>"list="hora_d"
                                         minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                         title="solo números de dos digitos"/>
                                        <datalist id="hora_d">
                                            <option value=""></option>
                                            <option value="01"> </option>
                                            <option value="02"> </option>
                                            <option value="03"> </option>
                                            <option value="04"> </option>
                                            <option value="05"> </option>
                                            <option value="06"> </option>
                                            <option value="07"> </option>
                                            <option value="08"> </option>
                                            <option value="09"> </option>
                                            <option value="10"> </option>
                                            <option value="11"> </option>
                                            <option value="12"> </option>
                                        </datalist><br>
                                        
                                    
                                        <input type="text" name="minutos_d" placeholder=""value="<?php echo $minutos_d;?>"list="minutos_d"
                                         minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                         title="solo números de dos digitos"/>
                                        <datalist id="minutos_d">
                                            <option value=""></option>
                                            <option value="00"> </option>
                                            <option value="01"> </option>
                                            <option value="02"> </option>
                                            <option value="03"> </option>
                                            <option value="04"> </option>
                                            <option value="05"> </option>
                                            <option value="06"> </option>
                                            <option value="07"> </option>
                                            <option value="08"> </option>
                                            <option value="09"> </option>
                                            <option value="10"> </option>
                                            <option value="11"> </option>
                                            <option value="12"> </option>
                                            <option value="13"> </option>
                                            <option value="14"> </option>
                                            <option value="15"> </option>
                                            <option value="16"> </option>
                                            <option value="17"> </option>
                                            <option value="18"> </option>
                                            <option value="19"> </option>
                                            <option value="20"> </option>
                                            <option value="21"> </option>
                                            <option value="22"> </option>
                                            <option value="23"> </option>
                                            <option value="24"> </option>
                                            <option value="25"> </option>
                                            <option value="26"> </option>
                                            <option value="27"> </option>
                                            <option value="28"> </option>
                                            <option value="29"> </option>
                                            <option value="30"> </option>
                                            <option value="31"> </option>
                                            <option value="32"> </option>
                                            <option value="33"> </option>
                                            <option value="34"> </option>
                                            <option value="35"> </option>
                                            <option value="36"> </option>
                                            <option value="37"> </option>
                                            <option value="38"> </option>
                                            <option value="39"> </option>
                                            <option value="40"> </option>
                                            <option value="41"> </option>
                                            <option value="42"> </option>
                                            <option value="43"> </option>
                                            <option value="44"> </option>
                                            <option value="45"> </option>
                                            <option value="46"> </option>
                                            <option value="47"> </option>
                                            <option value="48"> </option>
                                            <option value="49"> </option>
                                            <option value="50"> </option>
                                            <option value="51"> </option>
                                            <option value="52"> </option>
                                            <option value="53"> </option>
                                            <option value="54"> </option>
                                            <option value="55"> </option>
                                            <option value="56"> </option>
                                            <option value="57"> </option>
                                            <option value="58"> </option>
                                            <option value="59"> </option>
                                        </datalist><br>
                                                                            
                                        <input type="text" name="am_pm_d"placeholder=""value="<?php echo $am_pm_p;?>"list="am_pm_p"
                                         minlength="2" maxlength="2"  autocomplete="off"
                                    title="solo am ó pm"/>
                                            <option value=""></option>
                                            <option value="am"> </option>
                                            <option value="pm"> </option>
                                        </datalist><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>AULA<br>PREDEFENSA:</label></td>
                                    <td><input type="text" name="aula_pre"placeholder="Aula 1 ó Aula 2"list="aula_pre"
                                         minlength="6" maxlength="6"  autocomplete="off"
                                        title="solo Aula 1 ó Aula 2"/>
                                            <option value=""></option>
                                            <option value="Aula 1"></option>
                                            <option value="Aula 2"></option>
                                        </datalist>
                                    </td>
                                    <td bgcolor="white"></td>
                                        <td><label>AULA<br>DEFENSA:</label></td>
                                         <td><input type="text" name="aula_def"placeholder="Aula 1 ó Aula 2"list="aula_pre"
                                         minlength="6" maxlength="6"  autocomplete="off"
                                        title="solo Aula 1 ó Aula 2"/>
                                            <option value=""></option>
                                            <option value="Aula 1"></option>
                                            <option value="Aula 2"></option>
                                        </datalist>
                                </tr>
                                <tr>
                                    <td><label>Id Fecha:</label></td>
                                    <td><input type="text" readonly name="id_fecha" placeholder="" value="<?php echo $id_fecha;?>"></td>
                                    <td bgcolor="white">.....</td>
                                     <td><label>SEMESTRE:</label></td>
                                   <td><input type="text" name="semestre" placeholder="" value="<?php echo $row['semestre'];?>"list="semestre"
                                     minlength="1" maxlength="1" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                         title="solo números un digito"/>
                                        <datalist id="semestre" bgcolor="yellow">
                                            <option value="1" > </option>
                                            <option value="2"> </option>
                                        </datalist><br>
                                    </td>
                                </tr>
                                    <td></td><td></td>
                                    <td><a href="tabla.php">Regresar</a>
                                        <input type="submit" name="Aceptar" value="Aceptar"></td>
                                </tr>
                                                   
                        </form>
                    </table>
                </article>
        
		
	</center>
</body>
</html>
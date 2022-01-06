<?php
session_start();
error_reporting(0);
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:tabla.php");
}?>
<?php?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulario Fecha</title>
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
                    <h1>Agregar Fecha de<br> Predefensa y Defensa de Tesis</h1>

                    <table align="center" border="2px" class="caja2">
                        <?php if ($_SESSION['existe']==1) {
                                    echo '<html><body style="background-image:url(../imagenes/paredrocas.jpg);"><center><h1 style="background-color:blue;color:white;">Fecha Ya  Existe</h1></center></body></html>';
                                    $_SESSION['existe']=0;
                        }?>
                        <form action="operacion_guardar.php" method="POST">
                            
                                <tr><td bgcolor="orange" colspan="2"> P R E D E F E N S A :</td><td bgcolor="white"></td><td bgcolor="orange" colspan="2"> D E F E N S A :</td></tr>
                                <tr><td><label>FECHA :</label></td>
                                    <td><input type="text" REQUIRED name="dia_p" placeholder="dia" list="dia_p"
                                        minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" autofocus
                                    title="solo números de dos digitos"/>
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
                                    </datalist><br>
                                    
                                   
                                    <input type="text" REQUIRED name="mes_p" placeholder="mes"list="mes_p"
                                     minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" 
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
                                   
                                    <input type="text" REQUIRED name="ao_p" placeholder="año"list="ao_p"
                                     minlength="2" maxlength="4" required pattern="[0(0-9)]+" autocomplete="off" 
                                    title="solo números de cuatro digitos"/>
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
                                    <td><input type="text" REQUIRED name="dia_d" placeholder="dia"list="dia_d"
                                         minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" 
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
                                    
                                   
                                    <input type="text" REQUIRED name="mes_d" placeholder="mes"list="mes_d"
                                     minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off"
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
                                   
                                    <input type="text" REQUIRED name="ao_d" placeholder="año"list="ao_d"
                                     minlength="2" maxlength="4" required pattern="[0(0-9)]+" autocomplete="off"
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
                                <tr>
                                    <td><label>HORA :</label></td>
                                        <td><input type="text" REQUIRED name="hora_p" placeholder="hora"list="hora_p"
                                         minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" 
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
                                        
                                    
                                        <input type="text" REQUIRED name="minutos_p" placeholder="minutos"list="minutos_p"
                                         minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" 
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
                                                                            
                                        <input type="text" name="am_pm_p" placeholder=" am / pm "list="am_pm_p"
                                         minlength="2" maxlength="2" required pattern="(am|pm)" autocomplete="off"
                                    title="solo am ó pm"/>
                                        <datalist id="am_pm_p">
                                            <option value=""></option>
                                            <option value="am"> </option>
                                            <option value="pm"> </option>
                                        </datalist><br>
                                    </td>

                                    <td bgcolor="white"></td>
                                    <?php //HORA DEFENSA ?>

                                    <td><label>HORA :</label></td>
                                        <td><input type="text"  name="hora_d" placeholder="hora"list="hora_d"
                                             minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" 
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
                                        
                                    
                                        <input type="text" REQUIRED name="minutos_d" placeholder="minutos"list="minutos_d"
                                             minlength="2" maxlength="2" required pattern="[0(0-9)]+" autocomplete="off" 
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
                                                                            
                                        <input type="text" REQUIRE name="am_pm_d" placeholder="am / pm "list="am_pm_d"
                                         minlength="2" maxlength="2" required pattern="(am|pm)" autocomplete="off"
                                        title="solo am ó pm"/>
                                        <datalist id="am_pm_d">
                                            <option value=""></option>
                                            <option value="am"> </option>
                                            <option value="pm"> </option>
                                        </datalist><br>
                                    </td>
                                </tr>


                                <tr>
                                    <td><label>AULA<br> PREDEFENSA:</label></td>
                                    <td><input type="text" name="aula_pre" placeholder="Aula 1 ó Aula 2"list="aula_pre"
                                         minlength="6" maxlength="6"  autocomplete="off"
                                        title="solo Aula 1 ó Aula 2"/>
                                        <datalist id="aula_pre">
                                            <option value=""></option>
                                            <option value="Aula 1"></option>
                                            <option value="Aula 2"></option>
                                        </datalist><br>
                                    </td>
                                    <td bgcolor="white">.....</td>
                                    <td><label>AULA<br>DEFENSA:</label></td>
                                    <td><input type="text" name="aula_def"  placeholder="Aula 1  ó Aula 2"list="aula_def"
                                         minlength="6" maxlength="6"  autocomplete="off"
                                        title="solo <Aula 1 ó Aula 2"/>
                                        <datalist id="aula_def">
                                            <option value=""></option>
                                            <option value="Aula_1"></option>
                                            <option value="Aula_2"></option>
                                        </datalist><br>
                                    </td>
                                </tr>
                                    <td><label>SEMESTRE:</label></td>
                                    <td><input type="text" name="semestre" placeholder="1  ó  2 "list="semestre"
                                        required pattern="(1|2)"/>
                                        <datalist id="semestre" bgcolor="yellow" >
                                            <option value="" ></option>
                                            <option value="1" >2019/1</option>
                                            <option value="2"> 2019/2</option>
                                        </datalist><br>
                                    </td>
                                
                                    <td bgcolor="white">.....</td>
                                    
                                    <td><a href="tabla.php">Regresar</a></td>
                                   
                                    <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                                </tr>
                                                   
                        </form>
                    </table>
                </article>
       
		
	</center>
</body>
</html>
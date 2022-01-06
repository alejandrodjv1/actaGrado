
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
                    <h1 >Datos del Estudiante</h1>

                    <table align="center" border="2px" class="caja2">
                        <form action="operacion_guardar.php" method="POST">
                            <tr>
                                <td><label>Cedula::</label></td>
                                <td><input type="text" REQUIRED name="ci_a" placeholder="solo numeros..." value="" 
                                    minlength="5" maxlength="10" required pattern="[0-9]+" autocomplete="off"
                                    title="solo numeros. mínimo: 5 digitos. máximo: 10 digitos"  autofocus><br></td>
                            </tr>
                            <tr>
                                <td><label>Nombres<br>Apellidos:</label></td>
                                <td><input type="text" REQUIRED name="nom_a" placeholder=" solo letras..." value=""
                                    minlength="5" maxlength="20" required pattern="[A-Za-z,"" ]*" autocomplete="off"
                                     title="solo Letras. mínimo: 5 letras. máximo: 20 letras"/><br></td>
                            </tr>
                            
                            <tr>
                                <tr><td><label>Escuela :</label></td>
                                    <td><input type="text" REQUIRED name="es_a" placeholder=" Codigo escuela... "list="es_a"
                                        minlength="2" maxlength="2" title="Numeros del 41 al 51." autocomplete="off"/>
                                    <datalist id="es_a">
                                        <option value="41">Arquitectura             </option>
                                        <option value="42">Ingenieria  Civil        </option>
                                        <option value="43">Ingenieria Electrica           </option>
                                        <option value="44">Ingenieria Electronica         </option>
                                        <option value="45">Ingenieria Industrial          </option>
                                        <option value="46">Ingenieria Mtto Mecanico</option>
                                        <option value="47">Ingenieria de Sistemas         </option>
                                        <option value="48">Ingenieria de Diseño Industrial </option>
                                        <option value="49">Ingenieria Quimica             </option>
                                        <option value="50">Ingenieria de Petroleos        </option>
                                        <option value="51">Ingenieria Agronomica          </option>
                                    </datalist><br/>
                                    </td>
                                </tr>
                            
                            <tr>
                                <td><label>Materia Pendiente:</label></td>
                                    <!--<td><input type="text" REQUIRED name="mat_pend" placeholder=" solo numeros... "list="mat_pend"
                                        minlength="1" maxlength="2" required pattern="0(0|1|2|3|4|5|6|7|8|9)"
                                        title="Numeros del 1 al 10."/>
                                    -->
                                    <td><input type="text" REQUIRED name="mat_pend" placeholder=" solo numeros... "list="mat_pend"
                                        minlength="1" maxlength="2" title="Numeros del 01 al 10."/>
                                    <datalist id="mat_pend">
                                        <option value="00"> </option>
                                        <option value="01"> </option>
                                        <option value="02"> </option>
                                        <option value="03"> </option>
                                        <option value="04"> </option>
                                        <option value="05"> </option>
                                        <!--
                                        <option value="06"> </option>
                                        <option value="07"> </option>
                                        <option value="08"> </option>
                                        <option value="09"> </option>
                                    -->
                                    </datalist><br>
                                    </td>
                                </tr>
                                <tr>
                                <td><label>Titulo<br>Proyecto:</label></td>
                                <td>
                                    <textarea type="text" REQUIRED name="titulo_tesis_al" value=""
                                    minlength="5" maxlength="250" rows="5" cols="25" required pattern="[A-Za-z0-9,"".- ]*"
                                     placeholder="Letras y numeros. mínimo: 5 letras. máximo: 250 letras"></textarea><br>
                                    <!--
                                    <input type="text" REQUIRED name="titulo_tesis_al" placeholder="numero y letras..." value=""
                                    minlength="5" maxlength="40" required pattern="[A-Za-z0-9, ]*"
                                     title="solo Letras. mínimo: 5 letras. máximo: 40 letras"/><br>
                                 -->
                                </td>
                            </tr>
                            <tr>
                                <tr><td><label>Nota Proyecto :</label></td>
                                    <td><input type="text" REQUIRED name="nota_proy" placeholder=" solo numeros... "list="nota_proy"
                                        minlength="2" maxlength="2" required pattern="0(0|1|2|3|4|5|6|7|8|9)|1(1|2|3|4|5|6|7|8|9|0)|20"
                                        title="Numeros del 01 al 20."/>
                                    <datalist id="nota_proy">
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
                                    </datalist><br>
                                    </td>
                                </tr>
                            <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            
                            <td><a href="tabla.php">Regresar</a></td></tr>
                                                   
                        </form>
                        <?php if ($_SESSION['existe']==1) {
                                    echo '<html><body style="background-image:url(../imagenes/paredrocas.jpg);"><center><h1 style="background-color:blue;color:white;">Estudiante  Existe</h1></center></body></html>';
                                    $_SESSION['existe']=0;
                        }?>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
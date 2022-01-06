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
                    <td><h1>Oficina   </h1></td>
                    
                    <td><img src="../imagenes/ActoGraduacion.jpg" alt="Logo" width="100px"></td>
                    <td><h1>  Grado</h1></td>
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
           <li><a                                   class="bla"> Jurado</a>
                <ul class="submenu">
                    <li><a href="../jurado_1/tabla.php" class="bla">Jurado 1</a></li>
                    <li><a href="../jurado_2/tabla.php" class="bla">Jurado 2</a></li>
                    <li><a href="../jurado_3/tabla.php" class="bla">Jurado 3</a></li>
                </ul>
            </li>
            <li><a href="tabla.php"                 class="bla"> Acta</a></li>
            <li><a href="../catalogo/tabla.php"     class="bla"> Catalogo</a></li>
            <li><a href="../usuarios/tabla.php"     class="bla"> Seguridad</a></li>
            <li><a href="../index.php"              class="bla">Salir</a></li>
        </ul>
    </nav>

	<center>
		<section class="row">
                <article >
                    <h1>Datos del Acta</h1>

                    <table align="center" border="2px" >
                        <form action="operacion_guardar.php" method="POST">
                            <tr>
                                <td><label>Codigo del Acta:</label></td>
                                <td><input type="text" REQUIRED name="id_acta" placeholder="solo numeros..." value=""><br></td>
                            </tr>
                            
                            <tr>
                                <tr><td><label>Escuela :</label></td>
                                    <td><input type="text" REQUIRED name="escuela" placeholder=" Codigo escuela... "list="escuela"/>
                                    <datalist id="escuela">
                                        <option value="41">Arquitectura             </option>
                                        <option value="42">Ingenieria  Civil        </option>
                                        <option value="43">Ingenieria Electrica           </option>
                                        <option value="44">Ingenieria Electronica         </option>
                                        <option value="45">Ingenieria Industrial          </option>
                                        <option value="46">Ingenieria Mantenimiento Mecanico</option>
                                        <option value="47">Ingenieria de Sistemas         </option>
                                        <option value="48">Ingenieria de Diseño Industrial </option>
                                        <option value="49">Ingenieria Quimica             </option>
                                        <option value="50">Ingenieria de Petroleos        </option>
                                        <option value="51">Ingenieria Agronomica          </option>
                                    </datalist><br/>
                                    </td>
                             </tr>
                             <tr>
                                <td><label>Semestre:</label></td>
                                <td><input type="text" REQUIRED name="semestre" placeholder="  solo numeros..." value=""/><br/></td>
                            </tr>
                            <tr>
                                <td><label>Año:</label></td>
                                <td><input type="text" REQUIRED name="año" placeholder="  solo numeros..." value=""/><br/></td>
                            </tr>
                            <tr>
                                <td><label>Codigo de Tesis:</label></td>
                                <td><input type="text" REQUIRED name="id_tesis" placeholder="solo letras..." value=""/><br></td>
                            </tr>
                            
                            <tr>
                                <tr><td><label>Mencion de la Tesis :</label></td>
                                    <td><input type="text" REQUIRED name="id_menc" placeholder=" Mencion de la tesis... "list="id_menc"/>
                                    <datalist id="id_menc">
                                        <option value="1">Mencion Publicacion </option>
                                        <option value="2">Mencion Honorifica" </option>
                                        <option value="3">Sin Mencion </option>
                                    </datalist><br>
                                    </td>
                                </tr>

                            <tr>
                                <tr><td><label>Nota :</label></td>
                                    <td><input type="text" REQUIRED name="nota" placeholder=" Nota Definitiva... "list="nota"/>
                                    <datalist id="nota">
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

                            
                                <tr>
                                    <td><label>Codigo Jurado:</label></td>
                                    <td><input type="text" REQUIRED name="id_jurado" placeholder="   solo numeros..." value=""><br></td>
                                </tr>
                                
                               
                                
                                                       
                           <tr>
                            <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            
                            <td><a href="tabla.php">Regresar</a></td></tr>
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
<?php
session_start();

if(isset($_SESSION['nombre'])){?>
    <h1><?php echo 'Bienvenido(a)  Sr(a):'.$_SESSION['nombre'];?></h1><?php
}
else{
    echo 'No tienes session...';
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Validar Sesion</title>
        <title>Formulario</title>
        <link href="../css/estilos3.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>
        <header>
            <div align="center">
                <table>
                    <tr>
                        <td ><img src="../imagenes/L.png" alt="Logo" ></td>
                    </tr>
                </table>
            </div>
        </header>
        
        <center>
            <article ><br>
                <h1>Datos Requeridos del Usuario </h1>
                <table align="center" border="2px" class="caja2">
                    <form  action="recu_clave_buscar.php" method="POST">
                        <tr><td><label>Cedula:</label></td>
                            <td><input type="text" REQUIRED name="ced_usuario" placeholder=" V-12345678" autofocus
                                    value="" autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                    minlength="7" maxlength="10" required pattern="" 
                                    title="solo Letras y numeros con guion. mínimo: 7 letras. máximo: 10 letras"/>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Pregunta de Seguridad<br>Color Favorito:??</label></td>
                            <td><input type="password" REQUIRED name="resp_secreta" placeholder="Respuesta Secreta"
                                value=""   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                 minlength="3" maxlength="20" title=""/>
                            </td>
                        </tr>    
                        <td colspan="2"><input type="submit" value="Ingresar">
                                        <input type="reset"   value="Borrar" autofocus>
                                        <a href="../index.php">Regresar</a></td>
                    </form>
                </table>
               
            </article>
        </center>
                          
    </body>

    
</html>

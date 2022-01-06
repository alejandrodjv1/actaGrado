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
                        <td><img src="../imagenes/logo_largo_corpoelec.jpg" alt="Logo" width="700px"></td>
                    </tr>
                </table>
            </div>
        </header>
        
        <center>
            <article ><br>
                <h1>Inicio de Sesion</h1>
                <table align="center" border="2px" class="caja2">
                    <form  action="./usuarios/loginSession.php" method="POST">
                        <tr>
                            <td><label>Usuario</td>
                            <td><input type="text" name="usuario" autofocus required placeholder="Nombre de Usuario" 
                                    value="" minlength="3" maxlength="13" required pattern="[A-Za-z,0-9,-]+" autocomplete="off"
                                    title=" Tamaño mínimo: 3 Tamaño máximo: 13"/></td>
                        </tr>
                            <td><label>Clave</td>

                            <td><input type="password" name="clave" required placeholder="Puede tener - ñ * /" 
                                    value="" minlength="3" maxlength="10" required pattern="[A-Za-z,0-9,-,ñ,*,/]+" autocomplete="off"
                                    title="Tamaño mínimo: 3 Tamaño máximo: 10"/></td><br>
                        </tr>
                            <td colspan="2"><input type="submit" value="Ingresar">
                                <input type="reset" value="Borrar" ></td>
                    </form>
                </table><br>
                <td><a href="./usuarios/recuperar_clave.php">Recuperar Usuario ó Clave</a></td>
            </article>
        </center>
      
            <p class="sms"> Primera vez :<br>
                            USUARIO :admin<br>
                            CLAVE :admin</p>
        
    </body>

    
</html>

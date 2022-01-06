<?php
session_start();

if(isset($_SESSION['nombre'])){?>
    <h1><?php echo 'Bienvenido(a)  Sr(a):'.$_SESSION['nombre'];?></h1><?php
}
else{
    echo 'No tienes session...';
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<meta charset="utf-8">
   
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
    

                    <?php
                        $ced    = $_POST['ced_usuario'];
                        $resp   = $_POST['resp_secreta'];

                       

                        include("conexion.php");
                        $conn=conectar();

                        $query="SELECT * 
                                FROM usuario
                                WHERE ced_usuario='$ced'
                                AND resp_secreta='$resp'
                                ";
                        $res=$conn->query($query);
                        $row=$res->fetch_assoc();
                    ?>

                    
    <center>
        <section class="row">
                <article >
                    <br><h1>Datos de Usuario</h1>
                    <table  align="center" border="3" class="caja2">
                        <form action="operacion_modificar_clave.php" method="POST">
                             <tr>
                                <td><label>Cedula:</label></td>
                                <td><input type="text" REQUIRED name="ced_usuario" placeholder=""
                                        value="<?php echo $row['ced_usuario'];?>" autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                        minlength="10" maxlength="10" required pattern="" 
                                        title="solo Letras y numeros con guion. mínimo: 3 letras. máximo: 20 letras"/>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td><label>Nombre Completo:</label></td>
                                <td><input type="text" REQUIRED name="nom_usuario" placeholder=""
                                    value="<?php echo $row['nom_usuario'];?>"   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                     minlength="4" maxlength="20" title=""/>
                                </td>
                            </tr>
                           
                           <tr>
                                <td><label>Nuevo Usuario:</label></td>
                                <td><input type="text" REQUIRED name="usuario" placeholder="" autofocus
                                    value=""   autocomplete="off"  required pattern="[A-Za-z,0-9,.,-,""]*"
                                     minlength="4" maxlength="13" title=""/>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Nueva Clave:</label></td>
                                <td><input type="text" REQUIRED name="clave" placeholder="Incluye -,ñ,*,/,_"
                                    value=""   autocomplete="off"  required pattern="[A-Za-z,0-9,-,ñ,*,/,_]+"
                                     minlength="4" maxlength="10" title=""/>
                                </td>
                            </tr>
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                            <td><input type="submit" name="Aceptar" value="Aceptar"></td>
                            
                            <td><a href="../index.php">Regresar</a></td>
                                                   
                        </form>
                    </table>
                </article>
        </section>
		
	</center>
</body>
</html>
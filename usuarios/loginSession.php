<?php
	session_start();
    //recibiendo valores de index.phh
    $login      = $_POST["usuario"];
    $passwd     = $_POST["clave"];
    
        include("conexion.php");
        $conn=conectar();

        $query="SELECT * FROM usuario WHERE clave='$passwd' AND usuario='$login' 
                        AND (rol='Administrador') OR (rol='Usuario') ";
        $res=$conn->query($query);
        $row=$res->fetch_assoc();
        $user     =$row['usuario'   ];
        $pass     =$row['clave'     ];
        $rol      =$row['rol'       ];
        $nombre   =$row['nom_usuario'];
        

        if(($user==0)&&($pass==0)){
            if(($rol!='Administrador')||($rol!='Usuario')){
        	//VARIABLES PRECARGADAS
        	$user="admin";
        	$pass="admin";
            $rol       ="Admin";
            $nombre     ="Nuevo Administrador";}}

	if (($user==$login) && ($pass==$passwd)) {
		echo 'sesion creada';
        $_SESSION['loggin']=$user;
        $_SESSION['rol']=$rol;
        $_SESSION['nombre']=$nombre;

		echo "<script> window.location='index.php'
		</script>";	
	}
	else{echo 'no se creo';
        $_session["loggin"]=$user;
		 header("LOCATION:../index.php");
        
    }
	   
?>

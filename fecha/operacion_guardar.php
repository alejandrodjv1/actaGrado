<?php
session_start();
error_reporting(0);
$_SESSION['existe']=0;
?>
<?php
	include ("conexion.php");
	$conn=conectar();

   $id_fecha		= $_POST['id_fecha'];
	$dia_p			= $_POST['dia_p'];
	$mes_p			= $_POST['mes_p'];
	$ao_p				= $_POST['ao_p'];
	$fecha_p	= array($ao_p,$mes_p,$dia_p);
    $fecha_pre 	= implode("-",$fecha_p );
	
    $hora_p			= $_POST['hora_p'];
	$minutos_p		= $_POST['minutos_p'];
	$am_pm_p			= $_POST['am_pm_p'];
	$hora_h =array($hora_p,$minutos_p);
	$hora_ho	=implode(":",$hora_h);
	$hora_p = array($hora_ho,$am_pm_p);
	$hora_pre=implode(" ",$hora_p);
    $aula_pre   	= $_POST['aula_pre'];

	$dia_d			= $_POST['dia_d'];
	$mes_d			= $_POST['mes_d'];
	$ao_d				= $_POST['ao_d'];
	$fecha_d	= array($ao_d,$mes_d,$dia_d);
    $fecha_def 	= implode("-",$fecha_d );
	
    $hora_d			= $_POST['hora_d'];
	$minutos_d		= $_POST['minutos_d'];
	$am_pm_d			= $_POST['am_pm_d'];
	$hora_h =array($hora_d,$minutos_d);
	$hora_ho	=implode(":",$hora_h);
	$hora_d = array($hora_ho,$am_pm_d);
	$hora_def=implode(" ",$hora_d);	
    $aula_def   	= $_POST['aula_def'];
	
    $semestre   	= $_POST['semestre'];
	$anio			= $ao_p-2000;
	$estatus_fecha_tesis=0;
	$continuar=1;

	

		$query="SELECT * FROM fecha WHERE fecha_pre='$fecha_pre'";
		$res=$conn->query($query);
		$query="SELECT * FROM fecha WHERE hora_pre='$hora_pre'";
		$res1=$conn->query($query);
		$query="SELECT * FROM fecha WHERE aula_pre='$aula_pre'";
		$res2=$conn->query($query);

		$query="SELECT * FROM fecha WHERE fecha_def='$fecha_def'";
		$res3=$conn->query($query);
		$query="SELECT * FROM fecha WHERE hora_def='$hora_def'";
		$res4=$conn->query($query);
		$query="SELECT * FROM fecha WHERE aula_def='$aula_def'";
		$res5=$conn->query($query);
		echo (mysqli_num_rows($res)); 		
		echo (mysqli_num_rows($res1)); 		
		echo (mysqli_num_rows($res2)); 		
   		
  		



	
   if (mysqli_num_rows($res) < 1)
   	{if (mysqli_num_rows($res1) < 1)
   		{if (mysqli_num_rows($res2) < 1)
   			{if (mysqli_num_rows($res3) < 1)
   				{if (mysqli_num_rows($res4) < 1)
   					{if (mysqli_num_rows($res5) < 1)
   						{$query="	INSERT INTO fecha (fecha_pre,
											hora_pre,
											aula_pre,
											fecha_def,
											hora_def,
											aula_def,
											semestre,
											ao,
											estatus_fecha_tesis) 
						VALUES             ('$fecha_pre',
											'$hora_pre',
											'$aula_pre',
											'$fecha_def',
											'$hora_def',
											'$aula_def',
											'$semestre',
											'$anio',
											'$estatus_fecha_tesis');";

						$res=$conn->query($query);

						if($res){
							header("Location: tabla.php");
						}else{
							//echo $query;
							echo "Insercion noooooo exitosa";
						}
						}
					}
				}
			}
		}
	}else 
	{
		header("Location: formulario.php");
   		$continuar=0;
   		$_SESSION['existe']=1;
	}
	
?>


/**					if ((mysqli_num_rows($res1) > 0)&&(mysqli_num_rows($res2) > 0)&&(mysqli_num_rows($res3) > 0)) {
		   					header("Location: formulario.php");
		   					$continuar=0;
		   					$_SESSION['existe']=1;
		   				}
   $query="SELECT * FROM fecha WHERE fecha_pre='$fecha_pre'";
	$res=$conn->query($query);
		if (mysqli_num_rows($res) > 0) {
			$query="SELECT * FROM fecha WHERE hora_pre='$hora_pre'";
			$res=$conn->query($query);
			if (mysqli_num_rows($res) > 0) {
				$query="SELECT * FROM fecha WHERE aula_pre='$aula_pre'";
				$res=$conn->query($query);
				if (mysqli_num_rows($res) > 0) {
   					header("Location: formulario.php");
   					$continuar=0;
   					$_SESSION['existe']=1;
   				}
   			}
   		}

   $query="SELECT * FROM fecha WHERE fecha_def=$fecha_def";
	$res=$conn->query($query);
		if (mysqli_num_rows($res) > 0) {
			$query="SELECT * FROM fecha WHERE hora_def=$hora_def";
			$res=$conn->query($query);
			if (mysqli_num_rows($res) > 0) {
   				$query="SELECT * FROM fecha WHERE aula_def=$aula_def";
				$res=$conn->query($query);
				if (mysqli_num_rows($res) > 0) {
   					header("Location: formulario.php");
   					$continuar=0;
   					$_SESSION['existe']=1;
   				}
   			}
   		}

  */

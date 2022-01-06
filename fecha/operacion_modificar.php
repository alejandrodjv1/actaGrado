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
	
	
	
	if($fecha_pre){			
	$query="UPDATE  fecha 
				SET fecha_pre='$fecha_pre'           
				";
				$res3=$conn->query($query);
				if($res3)header("Location: tabla.php");
					//echo $query."  "."Modificacion fecha predefensa exitosa"."<br>";
				}
	if($hora_pre){			
	$query="UPDATE  fecha 
				SET hora_pre='$hora_pre'          
				WHERE 	id_fecha='$id_fecha'";
				$res4=$conn->query($query);
				if($res4)header("Location: tabla.php");
					//echo $query."  "."Modificacion hora_pre exitosa"."<br>";
				}
	if($fecha_def){			
	$query="UPDATE  fecha 
				SET fecha_def='$fecha_def'           
				";
				$res5=$conn->query($query);
				if($res5)header("Location: tabla.php");
					//echo $query."  "."Modificacion fecha_def exitosa"."<br>";
				}
	if($hora_def){			
	$query="UPDATE  fecha 
				SET hora_def='$hora_def'           
				WHERE 	id_fecha='$id_fecha'";
				$res6=$conn->query($query);
				if($res6)header("Location: tabla.php");
					//echo $query."  "."Modificacion hora def exitosa"."<br>";
				}
	if($semestre){			
	$query="UPDATE  fecha 
				SET semestre='$semestre'           
				WHERE 	id_fecha='$id_fecha'";
				$res7=$conn->query($query);
				if($res7)header("Location: tabla.php");
					//echo $query."  "."Modificacion semestre exitosa"."<br>";
				}
	if($aula_pre){
		$query="UPDATE  fecha 
				SET aula_pre='$aula_pre'
				WHERE 	id_fecha='$id_fecha'";
				$res8=$conn->query($query);
				if($res8)header("Location: tabla.php");
					//echo $query."  "."Modificacion aula pre exitosa"."<br>";
				}
	if($aula_def){
		$query="UPDATE  fecha 
				SET aula_def='$aula_def'
				WHERE 	id_fecha='$id_fecha'";
				$res9=$conn->query($query);
				if($res9)header("Location: tabla.php");
					//echo $query."  "."Modificacion aula def exitosa"."<br>";
				}
	if($anio){			
	$query="UPDATE  fecha 
				SET anio='$anio'         
				WHERE 	id_fecha='$id_fecha'";
				$res10=$conn->query($query);
				if($res10)header("Location: tabla.php");
					//echo $query."  "."Modificacion año exitosa"."<br>";
			}

	
			
				
			
?>

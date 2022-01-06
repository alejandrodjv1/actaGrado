<?php
	include ("conexion.php");
	$conn=conectar();

	$ci_p     	= $_REQUEST['ci_p'];
	$nom_p   	= $_POST['nom_p'];
	$es_p  		= $_POST['es_p'];
	$activo 	= $_POST['activo'];
	
	if($_POST['nom_p']==$nom_p){
		$query1="UPDATE  	profesor 
				SET 		nom_p	='$nom_p'
				WHERE 		ci_p 	=$ci_p ";
			$res1=$conn->query($query1);
			}
	if($_POST['activo']==$activo){
		$query2="UPDATE  	profesor 
				SET 		activo='$activo'
				WHERE 		ci_p 	=$ci_p ";
			$res2=$conn->query($query2);
			}
	if($_POST['es_p']==$es_p){
		$query3="UPDATE  	profesor 
				SET 		es_p	='$es_p'
				WHERE 		ci_p 	=$ci_p ";
			$res3=$conn->query($query3);
			}
	
	
	if($res1){header("Location: tabla.php");}
		elseif($res2){header("Location: tabla.php");}
			elseif($res3){header("Location: tabla.php");}
				else{header("Location: tabla1.php");}
	
?>
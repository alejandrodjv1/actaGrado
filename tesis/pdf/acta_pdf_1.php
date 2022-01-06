<?php
	include'plantilla1.php';
	include("conexion.php");
	$conn=conectar();
	$id_tesis_te=$_REQUEST['id_tesis_te']; 
	$ced_tesis=$_REQUEST['ced_tesis']; 
	$query="SELECT *  FROM tesis AS te
	INNER JOIN fecha AS fe 
	ON te.id_fecha_te=fe.id_fecha
	INNER JOIN alumno AS al
	ON te.ced_tesis=al.ci_a
	WHERE te.id_tesis_te=$id_tesis_te
	AND te.ced_tesis=$ced_tesis";
	$res=$conn->query($query);
	while($row=$res->fetch_assoc()){
		$f2=explode('-',$row['fecha_def']);
		$fecha_d=array($f2[2],$f2[1],$f2[0]);
		$fecha_def=implode("/",$fecha_d);
		$h1=explode(' ',$row['hora_def']);
		$hora_def=$h1[0]." ".$h1[1];
        $f=explode('-',$row['fecha_def']);
        $dia=$f[2]; $mes=$f[1]; $anio=$f[0];$ao=$f[0]-2000;
       
		$fecha_present=$dia."/".$mes."/".$ao;
			if($f[1]==1)$mes='enero';
				if($f[1]==2)$mes='febrero';
					if($f[1]==3)$mes='marzo';
						if($f[1]==4)$mes='abril';
							if($f[1]==5)$mes='mayo';
								if($f[1]==6)$mes='junio';
									if($f[1]==7)$mes='julio';
										if($f[1]==8)$mes='agosto';
											if($f[1]==9)$mes='septiembre';
												if($f[1]==10)$mes='octubre';
													if($f[1]==11)$mes='noviembre';
														if($f[1]==12)$mes='diciembre';	
		$h=explode(':',$row['hora_def']);				
		$hora_present=$h[0].":".$h[1];
	}
	$query="SELECT  
			*
			FROM tesis AS te
			INNER JOIN alumno AS al
            ON te.ced_tesis=al.ci_a
            INNER JOIN mencion AS me
            ON te.id_menc=me.id_menc
    		INNER JOIN 	tutor_met AS tu_met
			ON te.id_tutor_met=tu_met.id_tu_met
			INNER JOIN 	tutor_acad AS tu_acad
			ON te.id_tutor_acad=tu_acad.id_tu_acad
			INNER JOIN jurado_1 AS ju1
            ON te.id_jurado_1=ju1.id_jurado_1
            INNER JOIN jurado_2 AS ju2
            ON te.id_jurado_2=ju2.id_jurado_2
            INNER JOIN jurado_3 AS ju3
            ON te.id_jurado_3=ju3.id_jurado_3
			
			
			INNER JOIN escuela AS es
			ON al.es_a=es.escuela
			INNER JOIN fecha AS fe
			ON te.id_fecha_te=fe.id_fecha
			
			
			ORDER BY te.id_tesis_te ASC
			";
			$res=$conn->query($query);
			$row=$res->fetch_assoc();
						
					
							
	$ac = array($row['escuela'],$row['ao'],$row['semestre'],$row['id_tesis_te']);
    $acta  = implode("",$ac );
    if($row["id_tesis_te"]<=9){$num_acta="00".$row["id_tesis_te"];}
    	if(($row["id_tesis_te"]>=10)||($row["id_tesis_te"]<=99)){$num_acta="0".$row["id_tesis_te"];}
								
						

	$pdf= new PDF('p','mm', 'letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(70);
	// Conformacion del codigo de acta la cual deberia verse asi Nº 47161067
	$pdf->Cell(50,07,utf8_decode('Nº '.$row['escuela']).$row['ao'].$row['semestre'].$num_acta,0,0,'C');
		
	$pdf->Ln(15);

	if($row["id_menc"]<="3"){
		//$pdf->SetFillColor(232,232,232);
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(20);
		$pdf->MultiCell(150,07,utf8_decode('En la ciudad de Mérida a los '.$dia.' días del mes de '.$mes.' del '.$anio.','.
			' en la Sede Principal Extensión/Ampliación Mérida del Instituto Universitario Politécnico "Santiago'.
			' Mariño", se constituye el Jurado Evaluador conformado por '.$row['nom_ju_1' ].'  Cedula de Identidad Nº '.
			$row['ci_jur_1'].', '.$row['nom_ju_2' ].'  Cedula de Identidad Nº '.$row['ci_jur_2'].' y '.$row['nom_ju_3' ].
			' Cedula de Identidad Nº  '.$row['ci_jur_3'].', con la finalidad de'.' evaluar el Trabajo de Grado '.
			' titulado  '. $row["titulo_tesis"].' presentado por el(la) cuidadano(a) '.$row["nom_a"].' Cedula de Identidad Nº '.
			 $row["ci_a"].' cursante de la carrera de '.  utf8_encode($row["descripcion"]).' en el periodo academico '.$row['ao'].
			 '-'.$row['semestre'].', como requisito para optar al título de '.utf8_encode($row["descripcion"]).', bajo la tutoría del Ing. '.
			 $row['nom_tutor_acad'].' Cedula de Identidad Nº '.$row['ced_tutor_acad'].'. A los fines consiguientes  se '.
			 ' procedió a la presentación pública del referido Trabajo y una vez concluida la misma,'.
			 ' el Jurado Evaluador en  concordancia con  lo  dispuesto  en el  Reglamento sobre  el  Trabajo  de Grado'.
			 ' acordó emitir el veredicto de '.$row['apro_tesis'].' con la calificación de '.$row['nota_ac'].' puntos en la'.
			 ' escala del 1 al 20. De acuerdo al Reglamento de Trabajo  de Grado de  esta Institución el presente'.
			 ' Trabajo ha obtenido:'),0,'J',0);
		$pdf->Ln(10);
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(20);
	}
	if($row["id_menc"]=="1"){
		$pdf->Cell(150,07,$row["mencion"],0,1,'C');
		$pdf->Cell(20);$pdf->Cell(150,01,'_____________________________________________',0,1,'C');
		}elseif($row["id_menc"]=="2"){
			$pdf->Cell(150,07,$row["mencion"],0,1,'C');
			$pdf->Cell(20);$pdf->Cell(150,01,'_____________________________________________',0,1,'C');
			}elseif($row["id_menc"]=="3"){
				$pdf->Cell(150,07,$row["mencion"],0,1,'C');
				$pdf->Cell(20);$pdf->Cell(150,01,'_____________________________________________',0,1,'C');
				}elseif($row["id_menc"]=="4"){
					$pdf->SetFont('Arial','',10);
					$pdf->Cell(20);
					$pdf->MultiCell(150,07,utf8_decode('En la ciudad de Mérida a los '.$dia.' días del mes de '.$mes.' del '.$anio.','.
					' en la Sede Principal Extensión/Ampliación Mérida del Instituto Universitario Politécnico "Santiago'.
					' Mariño", se constituye el Jurado Evaluador conformado por '.$row['nom_ju_1' ].'  Cedula de Identidad Nº '.
					$row['ci_jur_1'].', '.$row['nom_ju_2' ].'  Cedula de Identidad Nº '.$row['ci_jur_2'].' y '.$row['nom_ju_3' ].
					' Cedula de Identidad Nº  '.$row['ci_jur_3'].', con la finalidad de'.' evaluar el Trabajo de Grado '.
					' titulado  '. $row["titulo_tesis"].' presentado por el(la) cuidadano(a) '.$row["nom_a"].' Cedula de Identidad Nº '.
					$row["ci_a"].' cursante de la carrera de '.  utf8_encode($row["descripcion"]).' en el periodo academico '.$row['ao'].
					'-'.$row['semestre'].', como requisito para optar al título de '.utf8_encode($row["descripcion"]).', bajo la tutoría del Ing. '.
					$row['nom_tutor_acad'].' Cedula de Identidad Nº '.$row['ced_tutor_acad'].'. A los fines consiguientes  se '.
					' procedió a la presentación pública del referido Trabajo y una vez concluida la misma,'.
					' el Jurado Evaluador en  concordancia con  lo  dispuesto  en el  Reglamento sobre  el  Trabajo  de Grado'.
					' acordó emitir el veredicto de '.$row['apro_tesis'].' con la calificación de '.$row['nota_ac'].' puntos en la'.
					' escala del 1 al 20. '),0,'J',0);
				}
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(20);$pdf->Cell(150,15,utf8_decode('Firman conformes el Jurado Evaluador,'),0,0,'J');
	$pdf->Ln(20);
	
	
	$pdf->Cell(20);$pdf->Cell(50,05,('____________________'),0,0,'C');
					$pdf->Cell(50,05,('____________________'),0,0,'C');
					$pdf->Cell(50,05,('____________________'),0,1,'C');
	$pdf->Cell(20);$pdf->Cell(50,03,$row['nom_ju_1' ],0,0,'C');
					$pdf->Cell(50,03,$row['nom_ju_2' ],0,0,'C');
					$pdf->Cell(50,03,$row['nom_ju_3' ],0,1,'C');
	$pdf->Cell(20);$pdf->Cell(50,07,'C.I.: '.$row['ci_jur_1'],0,0,'C');
					$pdf->Cell(50,07,'C.I.: '.$row['ci_jur_2'],0,0,'C');
					$pdf->Cell(50,07,'C.I.: '.$row['ci_jur_3'],0,1,'C');

	$pdf->Output();
?>
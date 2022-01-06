<?php
	include'plantilla1.php';
	include("conexion.php");
				$conn=conectar();
				$id_acta=$_REQUEST['id_acta']; 
				$query="SELECT * 
						FROM acta AS ac
						INNER JOIN tesis AS te
						ON ac.id_tesis=te.id_tesis_te
						INNER JOIN mencion AS me
						ON ac.id_menc=me.id_menc
						INNER JOIN jurado_1 AS ju1
						ON te.id_jurado_1=ju1.id_jurado_1
						INNER JOIN jurado_2 AS ju2
						ON te.id_jurado_2=ju2.id_jurado_2
						INNER JOIN jurado_3 AS ju3
						ON te.id_jurado_3=ju3.id_jurado_3

						INNER JOIN 	tutor_met AS tu_met
						ON te.id_tutor_met=tu_met.id_tu_met
						INNER JOIN 	tutor_acad AS tu_acad
						ON te.id_tutor_acad=tu_acad.id_tu_acad
												
						
						INNER JOIN alumno AS al 
						ON te.ced_tesis=al.ci_a
						INNER JOIN escuela AS es 
						ON al.es_a=es.escuela 
						INNER JOIN fecha AS fe
								ON te.id_fecha_te=fe.id_fecha
								WHERE id_acta=$id_acta
								AND fe.estatus_fecha_tesis=1
								
	   			 	";
						$res=$conn->query($query);
						$row=$res->fetch_assoc();
								$f=explode('-',$row['fecha_def']);
								$fecha_present=$f[2]."/".$f[1]."/".$f[0];
								$dia=$f[2]; $anio=$f[0]; $ao=$f[0]-2000;
								if($f[1]==1)$mes='enero';
									elseif($f[1]==2)$mes='febrero';
										elseif($f[1]==3)$mes='marzo';
											elseif($f[1]==4)$mes='abril';
												elseif($f[1]==5)$mes='mayo';
													elseif($f[1]==6)$mes='junio';
														elseif($f[1]==7)$mes='julio';
															elseif($f[1]==8)$mes='agosto';
																elseif($f[1]==9)$mes='septiembre';
																	elseif($f[1]==10)$mes='octubre';
																		elseif($f[1]==11)$mes='noviembre';
																			elseif($f[1]==12)$mes='diciembre';
								$h=explode(':',$row['hora_def']);
								$hora_present=$h[0].":".$h[1];
					

						$ac = array($row['escuela'],$row['ao'],$row['semestre'],$row['id_tesis_te']);
                                $acta  = implode("",$ac );
    		
				
	$pdf= new PDF('p','mm', 'letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(70);
	// Conformacion del codigo de acta la cual deberia verse asi Nº 47161067
	$pdf->Cell(50,07,utf8_decode('Nº '.$row['escuela'].$ao.$row['semestre'].$row["id_tesis_te"]),0,0,'C');
		
	$pdf->Ln(15);


	//$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(20);
	$pdf->MultiCell(150,07,utf8_decode('En la ciudad de Mérida a los '.$dia.' días del mes de '.$mes.' del '.$anio.','.
		' en la Sede Principal Extensión/Ampliación Mérida del Instituto Universitario Politécnico "Santiago'.
		' Mariño", se constituye el Jurado Evaluador conformado por '.$row['nom_ju_1' ].'  Cedula de Identidad Nº '.
		$row['ci_jur_1'].', '.$row['nom_ju_2' ].'  Cedula de Identidad Nº '.$row['ci_jur_2'].' y '.$row['nom_ju_3' ].
		' Cedula de Identidad Nº  '.$row['ci_jur_3'].', con la finalidad de'.' evaluar el Trabajo de Grado '.
		' titulado  '. $row["titulo_tesis"].' presentado por el(la) cuidadano(a) '.$row["nom_a"].' Cedula de Identidad Nº '.
		 $row["ci_a"].' cursante de la carrera de '.  utf8_encode($row["descripcion"]).' en el periodo academico '.$ao.
		 '-'.$row['semestre'].', como requisito para optar al título de '.utf8_encode($row["descripcion"]).', bajo la tutoría del Ing. '.
		 $row['nom_tutor_acad'].' Cedula de Identidad Nº '.$row['ced_tutor_acad'].'. A los fines consiguientes  se '.
		 ' procedió a la presentación pública del referido Trabajo y una vez concluida la misma,'.
		 ' el Jurado Evaluador en  concordancia con  lo  dispuesto  en el  Reglamento sobre  el  Trabajo  de Grado'.
		 ' acordó emitir el veredicto de '.$row["apro_tesis"].' con la calificación de '.$row['nota_ac'].' puntos en la'.
		 ' escala del 1 al 20. De acuerdo al Reglamento e Trabajo  de Grado de  esta Institución el presente'.
		 ' Trabajo ha obtenido:'),0,'J',0);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(20);
	$pdf->Cell(150,07,$row["mencion"],0,1,'C');if($row["id_menc"]<=2){
	$pdf->Cell(20);
	$pdf->Cell(150,01,'_____________________________________________',0,1,'C');}

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
<?php
	include'plantilla1.php';
	include("conexion.php");

	$conn=conectar();

	// Consulta para obtener nombre del primer jurado
	$query="SELECT   pr.nom_p,pr.ci_p
	FROM 	jurado_1 AS ju1
	INNER JOIN profesor AS pr 
	ON ju1.ci_jur_1=pr.ci_p";
	$res=$conn->query($query);
	while($row=$res->fetch_assoc()){
		$nom_p1=$row["nom_p"];
		$ci_jur_1=$row['ci_p'];
	}

	// Consulta para obtener nombre del segundo jurado
	$query="SELECT    pr.nom_p,pr.ci_p
	FROM 	jurado_2 AS ju2
	INNER JOIN profesor AS pr
	ON ju2.ci_jur_2=pr.ci_p";
	$res=$conn->query($query);
	while($row=$res->fetch_assoc()){
		$nom_p2=$row["nom_p"];
		$ci_jur_2=$row['ci_p'];
	}

	// Consulta para obtener nombre del tercer jurado
	$query="SELECT    pr.nom_p,pr.ci_p
	FROM 	jurado_3 AS ju3
	INNER JOIN profesor AS pr 
	ON ju3.ci_jur_3=pr.ci_p";
	$res=$conn->query($query);
	while($row=$res->fetch_assoc()){
		$nom_p3=$row["nom_p"];
		$ci_jur_3=$row['ci_p'];
	}
	
	$query="SELECT pr.nom_p,pr.ci_p
			FROM  tutor_met AS tu_met
			INNER JOIN profesor AS pr
			ON tu_met.ced_tutor_met=pr.ci_p	";
	$res=$conn->query($query);
	while($row=$res->fetch_assoc()){
			$nom_p_tu_met=$row["nom_p"];
			$ced_tu_met=$row["ci_p"];
	}
	$query="SELECT pr.nom_p,pr.ci_p
			FROM  tutor_acad AS tu_acad 
			INNER JOIN profesor AS pr
			ON tu_acad.ced_tutor_acad=pr.ci_p	";
	$res=$conn->query($query);
	while($row=$res->fetch_assoc()){
		$nom_p_tu_acad=$row["nom_p"];
		$ced_tu_acad=$row["ci_p"];
	}
	$query="SELECT fe.fecha_pre,fe.fecha_def,fe.hora_pre,fe.hora_def,fe.semestre,fe.ao,
					te3.id_fecha_te
			FROM tesis AS te3
			INNER JOIN fecha AS fe
			ON te3.id_fecha_te=fe.id_fecha";
			$res=$conn->query($query);
			while($row=$res->fetch_assoc()){
								
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
					$semestre=$row['semestre'];
					
				}
	// Consulta para obtener resto de datos del acta
	
   	$query="SELECT * 
			FROM acta AS ac
			INNER JOIN mencion AS me
			ON ac.id_menc=me.id_menc
			INNER JOIN tesis AS te
			ON ac.id_tesis=te.id_tesis_te
			
			INNER JOIN alumno AS al 
			ON te.ced_tesis=al.ci_a
			 
			INNER JOIN escuela AS es 
			ON al.es_a=es.escuela
			 ";
    		$res=$conn->query($query);
    		$row=$res->fetch_assoc();
				
				
	$pdf= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();


	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(10);
	$pdf->Cell(20,6,'Id_acta', 	1,0,'C',1);
	$pdf->Cell(20,6,'escuela', 	1,0,'C',1);
	$pdf->Cell(20,6,'semestre'	,1,0,'C',1);
	$pdf->Cell(20,6,utf8_decode('Año'),1,0,'C',1);
	$pdf->Cell(20,6,'Id Tesis',	1,0,'C',1);
	$pdf->Cell(25,6,'Id Mencion',1,0,'C',1);
	$pdf->Cell(20,6,'Nota',		1,0,'C',1);
	$pdf->Cell(30,6,'Fecha/hora',1,1,'C',1);
	


	$pdf->SetFont('Arial','',8);
	$pdf->Cell(10);
	while ($row=$res->fetch_assoc()) {
		
		$pdf->Cell(20,6, $row["es_ac"].$ao.$row["sem_ac"].$row["id_tesis"],1,0,'C');
		$pdf->Cell(20,6, $row['escuela' ],1,0,'C');
		$pdf->Cell(20,6, $row['semestre'],1,0,'C');
		$pdf->Cell(20,6,$row['ao'     	],1,0,'C');
		$pdf->Cell(20,6,$row['id_tesis'	],1,0,'C');
		$pdf->Cell(25,6,$row['id_menc' 	],1,0,'C');
		$pdf->Cell(20,6,$row['nota_ac'		],1,0,'C');
		$pdf->Cell(30,6,$row['fecha_def'].$row['hora_def'],1,1,'C');
		# code...	
	}

	

	$pdf->Output();
?>

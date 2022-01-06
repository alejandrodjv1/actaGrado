<?php

	include'plantilla.php';
	include("conexion.php");

	$conn=conectar();

	$query="SELECT  
						*
						
						FROM tesis AS te	 
						
						INNER JOIN alumno AS al
                        ON te.ced_tesis=al.ci_a
                       
						INNER JOIN 	tutor_met AS tu_met
						ON te.id_tutor_met=tu_met.id_tu_met
						INNER JOIN 	tutor_acad AS tu_acad
						ON te.id_tutor_acad=tu_acad.id_tu_acad
						INNER JOIN profesor AS pr
                        ON tu_met.ced_tutor_met=pr.ci_p
                        INNER JOIN profesor AS pr1
                        ON tu_acad.ced_tutor_acad=pr1.ci_p
						
						INNER JOIN escuela AS es
						ON al.es_a=es.escuela
						
					
						ORDER BY te.id_tesis_te ASC
						";
	$res=$conn->query($query);
		
	$pdf= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	

	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(10);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(15,6,'Codigo',1,0,'C',1);
	$pdf->Cell(30,6,'Autor',1,0,'C',1);
	$pdf->Cell(40,6,'Tutor Academico',1,0,'C',1);
	$pdf->Cell(40,6,'Tutor Metodologico',1,0,'C',1);
	$pdf->Cell(45,6,'Escuela',1,1,'C',1);
	
	

	$pdf->SetFont('Arial','',8);

	while($row=$res->fetch_assoc()){
		
		
		$pdf->Cell(10);	
		$pdf->Cell(15,12,$row['id_tesis_te'  ],1,0,'C');
		$pdf->Cell(30,6,$row['nom_a'  ],1,0,'C');
		$pdf->Cell(40,6,$row['nom_tutor_acad'   ],1,0,'C');
		$pdf->Cell(40,6,$row['nom_tutor_met'   ],1,0,'C');
		$pdf->Cell(45,6,$row['descripcion'   ],1,1,'C');

		$pdf->SetFillColor(232,232,232);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(25);
		$pdf->Cell(15,6,'Titulo',1,0,'C',1);
		$pdf->SetFont('Arial','',8);
		$pdf->MultiCell(140,6,$row['titulo_tesis'],1,1,0,'C',1);
	
	}
	$pdf->Output();
?>
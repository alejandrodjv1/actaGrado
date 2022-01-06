<?php

	include'plantilla.php';
	include("conexion.php");

	$conn=conectar();

	$query="SELECT  *
			FROM tesis AS te
			INNER JOIN alumno AS al
            ON te.ced_tesis=al.ci_a
           
            
			INNER JOIN 	tutor_met AS tu_met
			ON te.id_tutor_met=tu_met.id_tu_met
			INNER JOIN 	tutor_acad AS tu_acad
			ON te.id_tutor_acad=tu_acad.id_tu_acad
			
										
			INNER JOIN escuela AS es
			ON al.es_a=es.escuela
			
					
			ORDER BY id_tesis_te ASC
			";
	$res=$conn->query($query);
	
	$pdf= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->Cell(25);
	$pdf->SetFont('Arial','B',12);
	
	$pdf->Cell(30,6,'Autor',1,0,'C',1);
	$pdf->Cell(30,6,'Tutor',1,0,'C',1);
	$pdf->Cell(30,6,'Jurado 1',1,0,'C',1);
	$pdf->Cell(30,6,'Jurado 2',1,0,'C',1);
	$pdf->Cell(30,6,'Jurado 3',1,1,'C',1);
	
	$pdf->SetFont('Arial','',8);

	while($row=$res->fetch_assoc()){
		
	    if(($row["id_tesis_te"]>=10)&&($row["id_tesis_te"]<=99)){$num_acta="0".$row["id_tesis_te"];}
	
	    
		$pdf->Cell(25);	
		
		$pdf->Cell(30,6,$row['nom_a'  ],1,0,'C');
		$pdf->Cell(30,6,$row['nom_tutor_acad'   ],1,1,'C');
		
		$pdf->SetFillColor(232,232,232);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(25);
		$pdf->Cell(15,6,'Titulo',1,0,'C',1);
		$pdf->SetFont('Arial','',8);
		$pdf->MultiCell(135,6,$row['titulo_tesis'],1,1,0,'C',1);
	}
	$pdf->Output();
?>
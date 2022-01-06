<?php
	include'plantilla.php';
	include("conexion.php");

	$conn=conectar();

	$query="SELECT * FROM alumno WHERE 1";
$res=$conn->query($query);
				
				
	$pdf= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();


	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial'			,'B',12);
	$pdf->Cell(20);

	//$pdf->Cell(10,6,'Id'			,1,0,'C',1);
	$pdf->Cell(25,6,'CEDULA'		,1,0,'C',1);
	$pdf->Cell(40,6,'NOMBRE'		,1,0,'C',1);
	$pdf->Cell(10,6,'ESC'			,1,0,'C',1);
	$pdf->Cell(35,6,'MAT PEND'		,1,0,'C',1);
	$pdf->Cell(30,6,'NOTA PROY'		,1,1,'C',1);

	$pdf->SetFont('Arial','',8);

	while ($row=$res->fetch_assoc()) {
		$pdf->Cell(20);
		//$pdf->Cell(10,6,$row['id_a']		,1,0,'C',0);
		$pdf->Cell(25,6,$row['ci_a']		,1,0,'C',0);
		$pdf->Cell(40,6,$row['nom_a']		,1,0,'C',0);
		$pdf->Cell(10,6,$row['es_a']		,1,0,'C',0);
		$pdf->Cell(35,6,$row['mat_ped']	,1,0,'C',0);
		$pdf->Cell(30,6,$row['nota_proy']	,1,1,'C',0);
		# code...
	}

	

	$pdf->Output();
?>
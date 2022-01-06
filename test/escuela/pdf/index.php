<?php
	include'plantilla.php';
	include("conexion.php");

	$conn=conectar();

	$query="SELECT * FROM escuela WHERE 1";
	$res=$conn->query($query);
				
				
	$pdf= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();


	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20);
	$pdf->Cell(5,6,'Id',1,0,'C',1);
	$pdf->Cell(70,6,'Codigo de Escuela',1,0,'C',1);
	$pdf->Cell(70,6,'Nombre de la Escuela',1,1,'C',1);

	$pdf->SetFont('Arial','',8);

	while ($row=$res->fetch_assoc()) {
		$pdf->Cell(20);
		$pdf->Cell(5,6,$row['id_esc'],1,0,'C',0);
		$pdf->Cell(70,6,$row['escuela'],1,0,'C',0);
		$pdf->Cell(70,6,$row['descripcion'],1,1,'C',0);
		# code...
	}
	$pdf->Output();
?>
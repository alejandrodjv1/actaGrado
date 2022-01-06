<?php
	include("conexion.php");
	include ("plantilla.php");

					$query="SELECT * FROM escuela WHERE 1";
					$res=$conn->query($query);
				
				
	$pdf= new FPDF();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'Id',1,0,'C',1);
	$pdf->Cell(70,6,'Codigo Escuela',1,0,'C',1);
	$pdf->Cell(70,6,'Nombre Escuela',1,1,'C',1);



	$pdf->SetXY(50,10);
	$pdf->Cell(100,10,'Hola Mundo',1,1,'C');
	$pdf->Cell(100,10,'Hola Mundo2',0,1,'C');
	$pdf->MultiCell(100,5,'Hola Mundo Hola MundoHola MundoHola MundoHola MundoHola MundoHola Mundo',1,'C',0);


	$pdf->Output();
?>
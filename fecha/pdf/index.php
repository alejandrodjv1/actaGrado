<?php
	include'plantilla.php';
	include("conexion.php");

	$conn=conectar();

	$query="SELECT * FROM fecha";
	$res=$conn->query($query);		
				
	$pdf= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();


	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20);
	$pdf->Cell(5,6,'',1,0,'C',1);
	$pdf->Cell(60,6,'P R E D E F E N S A',1,0,'C',1);
	$pdf->Cell(60,6,'D E F E N S A',1,0,'C',1);
	$pdf->Cell(30,6,'',1,1,'C',1);
	$pdf->Cell(20);
	$pdf->Cell(5,6,'Id',1,0,'C',1);
	$pdf->Cell(30,6,'FECHA',1,0,'C',1);
	$pdf->Cell(30,6,'HORA',1,0,'C',1);
	$pdf->Cell(30,6,'FECHA',1,0,'C',1);
	$pdf->Cell(30,6,'HORA',1,0,'C',1);
	$pdf->Cell(30,6,'ASIGNADA',1,1,'C',1);

	$pdf->SetFont('Arial','',8);

	while ($row=$res->fetch_assoc()) {
	
	$f1=explode('-',$row['fecha_pre']);
	$fecha_p=array($f1[2],$f1[1],$f1[0]);
	$fecha_pre=implode("/",$fecha_p);
	$h1=explode(' ',$row['hora_pre']);
	$hora_pre=$h1[0]." ".$h1[1];
	 //---------------------------------------------------//*
	$f2=explode('-',$row['fecha_def']);
	$fecha_d=array($f2[2],$f2[1],$f2[0]);
	$fecha_def=implode("/",$fecha_d);
	$h1=explode(' ',$row['hora_def']);
	$hora_def=$h1[0]." ".$h1[1];

		$pdf->Cell(20);
		$pdf->Cell(5,6,$row['id_fecha'],1,0,'C',1);
		$pdf->Cell(30,6,$fecha_pre,1,0,'C',1);
		$pdf->Cell(30,6,$hora_pre,1,0,'C',1);
		$pdf->Cell(30,6,$fecha_def,1,0,'C',1);
		$pdf->Cell(30,6,$hora_def,1,0,'C',1);
		if($row['estatus_fecha_tesis']==1){$fecha_a="SI";}
			elseif($row['estatus_fecha_tesis']==0)$fecha_a="NO";
		$pdf->Cell(30,6,$fecha_a,1,1,'C',1);
		# code...
	}

	

	$pdf->Output();
?>
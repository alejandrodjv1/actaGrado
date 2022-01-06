<?php
$esc 		=$_GET['escuela'];

	include'plantilla.php';
	include("conexion.php");

	$conn=conectar();

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
						WHERE es.escuela=$esc

						ORDER BY nom_tesis ASC
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
	$pdf->Cell(30,6,'Tutor',1,0,'C',1);
	$pdf->Cell(30,6,'Jurado 1',1,0,'C',1);
	$pdf->Cell(30,6,'Jurado 2',1,0,'C',1);
	$pdf->Cell(30,6,'Jurado 3',1,1,'C',1);
	

	$pdf->SetFont('Arial','',8);
	while ($row=$res->fetch_assoc()){

	
	if($row["id_tesis_te"]<=9){$num_acta="00".$row["id_tesis_te"];}
        elseif(($row["id_tesis_te"]>=10)&&($row["id_tesis_te"]<=99)){$num_acta="0".$row["id_tesis_te"];}			
	$ac = array($row['escuela'],$row['ao'],$row['semestre'],$num_acta);
    $acta  = implode("",$ac );
	$pdf->Cell(10);	
	$pdf->Cell(15,12,$acta,1,0,'C');
	$pdf->Cell(30,6,$row['nom_tesis'  ],1,0,'C');
	$pdf->Cell(30,6,$row['nom_tutor_acad'   ],1,0,'C');
	$pdf->Cell(30,6,$row['nom_ju_1'   ],1,0,'C');
	$pdf->Cell(30,6,$row['nom_ju_2'   ],1,0,'C');
	$pdf->Cell(30,6,$row['nom_ju_3'   ],1,1,'C');
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(25);
	$pdf->Cell(15,6,'Titulo',1,0,'C',1);
	$pdf->SetFont('Arial','',8);
	$pdf->MultiCell(135,6,$row['titulo_tesis'],1,1,0,'C',1);
	

	
	
		# code...
	}

	

	$pdf->Output();
?>
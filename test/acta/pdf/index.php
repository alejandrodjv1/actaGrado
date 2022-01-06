<?php
	include'plantilla.php';
	include("conexion.php");

	$conn=conectar();

	$query="SELECT * FROM acta WHERE 1";
    $res=$conn->query($query);
    $row=$res->fetch_assoc();			
				
	$pdf= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();


	//$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','',8);
	$pdf->MultiCell(180,05,utf8_decode('En la ciudad de Caracas a los veintidós días del mes de agosto del 2016, en la Sede Principal Extensión/Ampliación Caracas del Instituto Universitario Politécnico “Santiago Mariño”, se constituye el Jurado Evaluador conformado por Freddy Pereira L, Cedula de Identidad Nº 11.145.139, Keyla Lugo P. Cedula de Identidad Nº 16.249.777 y Alfredo Salazar F. Cedula de Identidad Nº 13.546.200, con la finalidad de evaluar el  Trabajo  de  Grado  titulado  Diseño  de  un  Sistema de Interconexión Web para la localidad de Rio Chico presentado por el (la) cuidadano(a) Javier José Domínguez Álvarez Cedula de Identidad Nº 19.164.130, cursante de la carrera de Ingeniería de Sistemas en el periodo académico 2016-2, como requisito para optar al título de Ingeniería de Sistemas, bajo la tutoría de Ing. Carmen Nava Ortega Cedula de Identidad Nº  9.450.179. A los fines consiguientes se procedió a la presentación pública del referido Trabajo y una vez concluida la misma, el Jurado Evaluador en concordancia con lo dispuesto en el Reglamento sobre el Trabajo de Grado acordó emitir el veredicto de APROBADO con la calificación de Veinte (20) puntos en la escala del 1 al 20. De acuerdo al Reglamento de Trabajo de Grado de esta Institución el presente Trabajo ha obtenido:'),0,'L',0);
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(70);;
	$pdf->Cell(90,90,$row["mencion"],0,0,'c');

	$pdf->SetFont('Arial','',8);

	

	

	$pdf->Output();
?>
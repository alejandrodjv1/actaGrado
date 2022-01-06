<?php
	include'plantilla1.php';
	include("conexion.php");

	$conn=conectar();

	// Consulta para obtener nombre del primer jurado
	$query="SELECT   pr.nom_p
	FROM 	jurado AS ju
	INNER JOIN profesor AS pr 
	ON ju.ci_jurado_1=pr.ci_p";
	$res=$conn->query($query);
	while($row=$res->fetch_assoc()){
		$nom_p1=$row["nom_p"];
	}

	// Consulta para obtener nombre del segundo jurado
	$query="SELECT    pr.nom_p
	FROM 	jurado AS ju
	INNER JOIN profesor AS pr
	ON ju.ci_jurado_2=pr.ci_p";
	$res=$conn->query($query);
	while($row=$res->fetch_assoc()){
		$nom_p2=$row["nom_p"];
	}

	// Consulta para obtener nombre del tercer jurado
	$query="SELECT    pr.nom_p
	FROM 	jurado AS ju
	INNER JOIN profesor AS pr 
	ON ju.ci_jurado_3=pr.ci_p";
	$res=$conn->query($query);
	while($row=$res->fetch_assoc()){
		$nom_p3=$row["nom_p"];
	}

	// Consulta para obtener resto de datos del acta
	$query="SELECT * 
			FROM acta AS ac
			INNER JOIN mencion AS me
			ON ac.id_menc=me.id_menc
			INNER JOIN tesis AS te
			ON ac.id_tesis=te.id_tesis
			INNER JOIN fecha AS fe
			ON te.id_fecha=fe.id_fecha
			INNER JOIN tutor AS tu 
			ON te.id_tutor=tu.id_tutor
			INNER JOIN Jurado AS ju 
			ON te.id_jurado=ju.id_jurado
			INNER JOIN alumno AS al 
			ON te.ci_a=al.ci_a
			INNER JOIN escuela AS es 
			ON al.es_a=es.escuela";
    $res=$conn->query($query);
    $row=$res->fetch_assoc();			
				
	$pdf= new PDF('p','mm', 'letter');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',15);
	$pdf->Cell(70);
	// Conformacion del codigo de acta la cual deberia verse asi Nº 47161067
	//Imprime codigo carrera en dos digitos
	$pdf->Cell(07,05,utf8_decode('Nº'),0,0,'c');
	$pdf->Cell(07,05,$row["es_ac"],0,0,'C');
	//Imprime año presentacion tesis en dos digitos
	$pdf->Cell(07,05,$row["ao"],0,0,'C');
	//Imprime semestre de prsentacion tesis 1 o 2
	$pdf->Cell(07,05,$row["sem_ac"],0,0,'C');
	//Imprime ID de la tesis en tres digitos
	$pdf->Cell(07,05,$row["id_tesis"],0,0,'C');
	
	$pdf->Ln(10);


	//$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(20);
	$pdf->Cell(170,07,utf8_decode('En la ciudad de Caracas a los veintidós días del mes de agosto del 2016, en la Sede Principal'),0,1,'');
	$pdf->Cell(20);
	$pdf->Cell(170,07,utf8_decode('Extensión/Ampliación    Caracas  del  Instituto  Universitario   Politécnico   "Santiago   Mariño",'),0,1,'');
	$pdf->Cell(20);
	$pdf->Cell(80,07,utf8_decode('se constituye el Jurado Evaluador conformado por'),0,0,'');
	$pdf->Cell(70,07,$nom_p1,0,1,'R');
	$pdf->Cell(20);
	$pdf->Cell(38,07,utf8_decode('Cedula de Identidad Nº'),0,0,'C');
	$pdf->Cell(35,07,$row["ci_jurado_1"],0,0,'C');
	$pdf->Cell(07,07,',',0,0,'C');
	$pdf->Cell(70,07,$nom_p2,0,1,'R');
	$pdf->Cell(20);
	$pdf->Cell(38,07,utf8_decode('Cedula de Identidad Nº'),0,0,'C');
	$pdf->Cell(35,07,$row["ci_jurado_2"],0,0,'C');
	$pdf->Cell(07,07,'y',0,0,'C');
	$pdf->Cell(70,07,$nom_p3,0,1,'R');
	$pdf->Cell(20);
	$pdf->Cell(38,07,utf8_decode('Cedula de Identidad Nº'),0,0,'C');
	$pdf->Cell(35,07,$row["ci_jurado_3"],0,0,'C');
	$pdf->Cell(33,07,utf8_decode(', con la finalidad de evaluar el Trabajo de Grado' ),0,1,'');
	$pdf->Cell(20);
	$pdf->Cell(15,07,utf8_decode('titulado'),0,0,'L'); 
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(135,07,$row["titulo_tesis"],0,1,'R');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(20);
	$pdf->Cell(60,07,utf8_decode('presentado por el (la) cuidadano(a) '),0,0,'L');
	$pdf->Cell(50,07,$row["nom_a"],0,0,'C');
	$pdf->Cell(40,07,utf8_decode('Cedula de Identidad Nº'),0,1,'R');
	$pdf->Cell(20);
	$pdf->Cell(18,07,$row["ci_a"],0,0,'L');
	$pdf->Cell(45,07,utf8_decode('cursante de la carrera de'),0,0,'L');
	$pdf->Cell(65,07,$row["descripcion"],0,0,'C');
	$pdf->Cell(22,07,utf8_decode('en el periodo'),0,1,'R');
	$pdf->Cell(20);
	$pdf->Cell(18,07,utf8_decode('academico'),0,0,'L');
	$pdf->Cell(8,07,$row['ao']+2000,0,0,'L');
	$pdf->Cell(2,07,'-',0,0,'C');
	$pdf->Cell(2,07,$row['sem_ac'],0,0,'R');
	$pdf->Cell(57,07,utf8_decode(', como requisito para optar al título de'),0,0,'L');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(65,07,$row['descripcion'].",",0,1,'R');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(20);
	$pdf->Cell(13,07,utf8_decode('bajo la'),0,0,'L');
	$pdf->Cell(25,07,utf8_decode('tutoría de Ing.'),0,0,'L');
	$pdf->Cell(35,07,$row["nom_tutor_met"],0,0,'C');
	$pdf->Cell(33,07,utf8_decode('Cedula de Identidad Nº'),0,0,'C');
	$pdf->Cell(25,07,$row["ced_tutor_met"],0,0,'C');
	$pdf->Cell(20,07,utf8_decode('. A los fines'),0,1,'R');
	$pdf->Cell(20);
	$pdf->Cell(150,07,utf8_decode('consiguientes  se  procedió   a   la   presentación   pública   del   referido   Trabajo   y   una   vez'),0,1,'C');
	$pdf->Cell(20);
	$pdf->Cell(150,07,utf8_decode('concluida la misma, el Jurado Evaluador en  concordancia  con  lo  dispuesto  en el  Reglamento'),0,1,'C');
	$pdf->Cell(20);
	$pdf->Cell(90,07,utf8_decode('sobre  el  Trabajo  de Grado acordó emitir el veredicto de'),0,0,'C');
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,07,$row["apro_tesis"],0,0,'C');
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(25,07,utf8_decode('con la calificación de'),0,1,'C');
	$pdf->Cell(20);
	$pdf->Cell(10,07,$row["nota_ac"],0,0,'L');
	
	$pdf->Cell(130,07,utf8_decode('puntos en la  escala del 1 al 20.   De  acuerdo  al  Reglamento   de Trabajo  de Grado de '),0,1,'L');
	$pdf->Cell(20);
	$pdf->Cell(50,07,utf8_decode('esta Instituciónel presente Trabajo ha obtenido:'),0,1,'L');
	$pdf->SetFont('Arial','B',15);
	$pdf->Ln(10);
	$pdf->Cell(20);
	$pdf->Cell(150,07,$row["mencion"],0,1,'C');
	$pdf->Cell(20);	
	$pdf->Cell(150,01,'_____________________________________________',0,1,'C');

	$pdf->SetFont('Arial','',10);
	$pdf->Ln(20);
	$pdf->Cell(20);$pdf->Cell(50,05,$nom_p1,0,0,'C');
					$pdf->Cell(50,05,$nom_p2,0,0,'C');
					$pdf->Cell(50,05,$nom_p3,0,1,'C');
	$pdf->Cell(20);$pdf->Cell(50,01,utf8_decode('____________________'),0,0,'C');
					$pdf->Cell(50,01,utf8_decode('____________________'),0,0,'C');
					$pdf->Cell(50,01,utf8_decode('____________________'),0,1,'C');
	$pdf->Cell(20);$pdf->Cell(50,07,utf8_decode('Jurado Evaluador'),0,0,'C');
					$pdf->Cell(50,07,utf8_decode('Jurado Evaluador'),0,0,'C');
					$pdf->Cell(50,07,utf8_decode('Jurado Evaluador'),0,1,'C');
	$pdf->Cell(20);$pdf->Cell(05,07,'C.I.:',0,0,'C');$pdf->Cell(45,07,$row["ci_jurado_1"],0,0,'C');
	$pdf->Cell(02);$pdf->Cell(05,07,'C.I.:',0,0,'C');$pdf->Cell(45,07,$row["ci_jurado_2"],0,0,'C');
	$pdf->Cell(02);$pdf->Cell(05,07,'C.I.:',0,0,'C');$pdf->Cell(40,07,$row["ci_jurado_3"],0,1,'C');

	$pdf->Output();
?>
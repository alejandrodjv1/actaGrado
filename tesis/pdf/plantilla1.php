<?php
	require 'fpdf/fpdf.php';

	class PDF extends FPDF{
		function Header(){
			//$this->Image($file, $x=null, $y=null, $w=0, $h=0, $type='', $link='');
			//$this->Cell(50);
			$this->Image('images/sello.jpg',137,25,48,12);


			
			$this->SetFont('Arial','B',15);
			$this->Ln(40);
			$this->Cell(20);
			$this->Cell(150,10,'ACTA DE VEREDICTO DE TRABAJO DE GRADO',0,1,'C');
			

		}
		function Footer(){

			$this->SetFont('Arial','B',10);
			$this->Ln(10);
			$this->Cell(20);
			$this->Cell(150,07,utf8_decode('Firma y Sello del Departamento de Investigación, Postgrado y Producción.'),0,1,'L');
			
			$this->SetFont('Arial','',8);
			$this->Cell(20);
			$this->Cell(100,07,utf8_decode('Deberá imprimirse en papel membretado.'),0,0,'L');
			$this->Cell(50,07,utf8_decode('Valido sin enmienda.'),0,1,'L');

			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}

?>
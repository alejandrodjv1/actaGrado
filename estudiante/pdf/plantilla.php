<?php
	require 'fpdf/fpdf.php';

	class PDF extends FPDF{
		function Header(){
			//$this->Image($file, $x=null, $y=null, $w=0, $h=0, $type='', $link='');
			$this->Image('images/L.png',50,10,120,50);


			
			
			$this->SetFont('Arial','B',15);
			$this->Ln(50);
			$this->Cell(20);
			$this->Cell(150,10,'LISTA DE ESTUDIANTES',0,1,'C');

		}
		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}

?>
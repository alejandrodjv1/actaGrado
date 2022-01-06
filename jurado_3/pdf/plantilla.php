<?php
	require 'fpdf/fpdf.php';

	class PDF extends FPDF{
		function Header(){
			//$this->Image($file, $x=null, $y=null, $w=0, $h=0, $type='', $link='');
			$this->Image('images/logo.png',10,10,40,30);


			$this->SetFont('Arial','B',15);
			$this->Cell(70);
			$this->Cell(90,90,'Lista de Escuelas',0,0,'c');

			$this->Ln(50);

		}
		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}

?>
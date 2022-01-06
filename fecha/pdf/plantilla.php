<?php
	require 'fpdf/fpdf.php';

	class PDF extends FPDF{
		function Header(){
			//$this->Image($file, $x=null, $y=null, $w=0, $h=0, $type='', $link='');
			$this->Image('images/L.png',30,10,160,40);


			$this->SetFont('Arial','B',15);
			$this->Ln(35);
			$this->Cell(85);
			$this->Cell(150,7,'Fechas',0,1 ,'c');
			$this->Cell(75);
			$this->Cell(150,7,'Defensa de Tesis',0,1,'c');


		}
		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}
?>
<?php
	require 'fpdf/fpdf.php';

	class PDF extends FPDF{
		function Header(){
			//$this->Image($file, $x=null, $y=null, $w=0, $h=0, $type='', $link='');
			$this->Image('images/logo.png',30,10,40,30);


			
			$this->SetFont('Arial','B',12);
			$this->Ln(05);
			$this->Cell(40);
			$this->Cell(150,05	 ,utf8_decode('República Bolivariana de Venezuela'),0,1,'C');
			$this->Cell(40);
			$this->Cell(150,05	 ,utf8_decode('Ministerio del Poder Popular para La Educación'),0,1,'C');
			$this->Cell(40);
			$this->Cell(150,05	 ,utf8_decode('Instituto Universitario Politécnico'),0,1,'C');
			$this->Cell(40);
			$this->Cell(150,05	 ,utf8_decode('"Santiago Mariño"'),0,1,'C');
			$this->Cell(40);
			$this->Cell(150,05	 ,utf8_decode('Extensión Mérida'),0,1,'C');
			$this->Ln(10);
			$this->Cell(20);
			$this->Cell(150,10,'LISTA DE TESIS',0,0,'C');

			$this->Ln(10);


		}
		function Footer(){

			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
		}
	}

?>
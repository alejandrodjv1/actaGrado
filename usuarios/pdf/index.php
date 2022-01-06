<?php
session_start();
$var_rol = $_SESSION['rol'];
if($var_rol==null||$var_rol==''||$var_rol=='Usuario'){?>
    <h1><?php //echo "No Tienes Autorización";?></h1><?php
    header("LOCATION:index.php");
}?>
<?php
	include'plantilla.php';
	include("conexion.php");

	$conn=conectar();

	$query="SELECT * FROM usuario WHERE 1";
	$res=$conn->query($query);
				
				
	$pdf= new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(15);
	$pdf->Cell(15,6,'Id',1,0,'C',1);
	$pdf->Cell(30,6,'Cedula',1,0,'C',1);
	$pdf->Cell(30,6,'Nombre',1,0,'C',1);
	$pdf->Cell(30,6,'Usuario',1,0,'C',1);
	$pdf->Cell(30,6,'Clave',1,0,'C',1);
	$pdf->Cell(20,6,'Rol',1,1,'C',1);
	


	$pdf->SetFont('Arial','',8);

	while ($row=$res->fetch_assoc()) {
		$pdf->Cell(15);
		$pdf->Cell(15,6,$row['id'],1,0,'C',0);
		$pdf->Cell(30,6,$row['ced_usuario'],1,0,'C',0);
		$pdf->Cell(30,6,$row['nom_usuario'],1,0,'C',0);
		$pdf->Cell(30,6,$row['usuario'],1,0,'C',0);
		$pdf->Cell(30,6,$row['clave'],1,0,'C',0);
		$pdf->Cell(20,6,$row['rol'],1,1,'C',0);
		
		# code...
	}
	$pdf->Output();
?>
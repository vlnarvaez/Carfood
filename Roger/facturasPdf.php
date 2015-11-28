<?php
require('conexion.php');
require('fpdf/fpdf.php');
$ceduEnv=$_POST['cedula'];
session_start();

$consul=mysql_query("SELECT * FROM cliente");
$puerta='continuar';
while ($filas=mysql_fetch_array($consul)and $puerta='continuar' ) {
	$CEDULA=$filas['CEDULA'];
	$NOMBRES=$NOMBRES=$filas['NOMBRES'];
	$APELLIDOS=$filas['APELLIDOS'];
	$TELEFONO=$filas['TELEFONO'];
	$EMAIL=$filas['EMAIL'];
	
	
	if($ceduEnv==$CEDULA){	
		$miCliente=array('CEDULA' => $CEDULA, 'NOMBRES' => $NOMBRES, 'APELLIDOS' => $APELLIDOS, 'TELEFONO' => $TELEFONO, 'EMAIL' => $EMAIL);
		$_SESSION['miCliente']=$miCliente; 
		


	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 10);
	#$pdf->Image('../recursos/tienda.gif' , 10 ,8, 10 , 13,'GIF');
	$pdf->Cell(18, 10, '', 0);
	$pdf->Cell(150, 10, 'Abarrotes "PHP & JQuery"', 0);
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
	$pdf->Ln(15);
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Cell(70, 8, '', 0);
	$pdf->Cell(100, 8, 'FACTURA', 0);
	$pdf->Ln(23);
	$pdf->SetFont('Arial', '', 8);
	//CONSULTA

	if($consulta = mysql_query("SELECT * FROM cliente where CEDULA=$ceduEnv")){
	
	$consulta2 = mysql_fetch_array($consulta);

	$pdf->Cell(20, 8, 'Cedula', 0);
	$pdf->Cell(20, 8,$consulta2['CEDULA'], 0);
	$pdf->Ln(4);
	$pdf->Cell(20, 8, 'Nombre', 0);	
	$pdf->Cell(20, 8,$consulta2['NOMBRES'], 0);
	$pdf->Ln(4);
	$pdf->Cell(20, 8, 'Apellido', 0);
	$pdf->Cell(20, 8,$consulta2['APELLIDOS'], 0);
	$pdf->Ln(4);	
	$pdf->Cell(20, 8, 'Telefono', 0);
	$pdf->Cell(20, 8,$consulta2['TELEFONO'], 0);
	$pdf->Ln(4);	
	$pdf->Cell(20, 8, 'Email', 0);
	$pdf->Cell(20, 8,$consulta2['EMAIL'], 0);
	$pdf->Ln(4);
	
	$pdf->SetFont('Arial', '', 8);
	#$item = 0;
	$totaluni = 0;
	$totaldis = 0;
	$pdf->Output();	
}

	/*while($consulta2 = mysql_fetch_array($consulta)){
		$item = $item+1;
		$totaluni = $totaluni + $consulta2['precio_unit'];
		$totaldis = $totaldis + $consulta2['precio_dist'];
		$pdf->Cell(15, 8, $item, 0);
		$pdf->Cell(80, 8,$consulta2['nomb_prod'], 0);
		$pdf->Cell(40, 8, $consulta2['tipo_prod'], 0);
		$pdf->Cell(25, 8, 'S/. '.$consulta2['precio_unit'], 0);
		$pdf->Cell(25, 8, 'S/. '.$consulta2['precio_dist'], 0);
		$pdf->Ln(8);
	}*/
	/*$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(114,8,'',0);
	$pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
	$pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);*/


}else{
	$puerta='salir';

	}
}
?>
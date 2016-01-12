<?php
require('conexion.php');
require('fpdf/fpdf.php');
$ceduEnv=$_POST['cedula'];
session_start();

$consul=mysql_query("SELECT * FROM cliente");
$puerta='continuar';

while ($filas=mysql_fetch_array($consul) and $puerta='continuar' ) {
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
	$pdf->SetDrawColor(0, 0, 0);
    $pdf->SetFillColor(130,	0,	0);
	$pdf->Cell(197, 30, '', 1);
    $pdf->Ln(10);
	$pdf->Image('images/logo.png' , 20 ,14, 20 , 23,'PNG');
	$pdf->Cell(40, 10, '', 0);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(30, 8, 'Nombre Empresa:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(60, 8, 'CARFOOD', 0);
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->SetTextColor(255, 255, 255);
	$pdf->Cell(20, 8, 'R.U.C. ', 1, 0,'C', True);
	$pdf->SetFont('Arial', '', 14);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(8, 8,utf8_decode(' Nº: 220956789'), 0);
	$pdf->Ln(4);
	$pdf->Cell(40, 10, '', 0);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(30, 8, 'Direccion:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(20, 8, 'Marcelino Champagnat, San Cayetano Alto', 0);
	$pdf->Ln(4);
	$pdf->Cell(40, 10, '', 0);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(30, 8, 'Telefono:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(20, 8, '2577616', 0);
	$pdf->Ln(4);
	$pdf->Cell(40, 10, '', 0);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(30, 8, 'Email:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(20, 8, 'carfood@gmail.com', 0);
	$pdf->SetFont('Arial', '', 9);
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Ln(10);
	$pdf->Cell(80, 8, '', 0);
	$pdf->Ln(13);
	
	$pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(197, 30, '', 1);
    $pdf->Cell(30, 35, '', 0);
   
    $pdf->Ln(4);
	
	$pdf->Cell(10, 5, '');
	$pdf->SetTextColor(255, 255, 255);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(20, 5, 'Cedula:', 1, 0,'C', True);
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(4, 5);
	$pdf->Cell(60, 5,$miCliente['CEDULA'], 0);

	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(10, 5, '');
	$pdf->SetTextColor(255, 255, 255);
	$pdf->Cell(20, 5, 'Telefono:', 1, 0,'C', True);
	$pdf->SetFont('Arial', '', 8);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(4, 5);
	$pdf->Cell(90, 5,$miCliente['TELEFONO'], 0);
	$pdf->Ln(8);	

    $pdf->Cell(10, 5, ''); 
    $pdf->SetTextColor(255, 255, 255);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(20, 5, 'Nombre:', 1, 0,'C', True);
	$pdf->SetFont('Arial', '', 8);	
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(4, 5);
	$pdf->Cell(60, 5,$miCliente['NOMBRES'], 0);

	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(10, 5, '');
	$pdf->SetTextColor(255, 255, 255);
	$pdf->Cell(20, 5, 'Email:', 1, 0,'C', True);
	$pdf->SetFont('Arial', '', 8);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(4, 5);
	$pdf->Cell(20, 5,$miCliente['EMAIL'], 0);
	$pdf->Ln(8);

	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(10, 5, '');
	$pdf->SetTextColor(255, 255, 255);
	$pdf->Cell(20, 5, 'Apellido:', 1, 0,'C', True);
	$pdf->SetFont('Arial', '', 8);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(4, 5);
	$pdf->Cell(60, 5,$miCliente['APELLIDOS'], 0);

	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(10, 5, '');
    $pdf->SetTextColor(255, 255, 255);
	$pdf->Cell(20, 5, 'Fecha: ', 1, 0,'C', True);
	$pdf->SetFont('Arial', '', 8);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(4, 5);
	$pdf->Cell(20, 5, date('d-m-Y').'', 0);
	$pdf->Ln(8);	
	
	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Ln(20);
	$pdf->Cell(80, 8, '', 0);
	$pdf->Cell(100, 8, 'DETALLE', 0);
	$pdf->Ln(13);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->SetTextColor(255, 255, 255);
	$pdf->Cell(15, 8, 'Item', 1, 0,'C', True);
	$pdf->Cell(140, 8, 'Detalle', 1, 0,'C', True);
	$pdf->Cell(25, 8, 'Precio', 1, 0, 'C',  True);

	$pdf->Ln(8);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->SetFont('Arial', '', 8);
	$item = 0;
	$Total = 0;
	if($consulta2 = mysql_query("SELECT * FROM pedidos where $ceduEnv=CEDULA")){
		$consulta3 = mysql_fetch_array($consulta2);
		$Total = $consulta3['TOTAL'];
				
		if ($consulta4 = mysql_query("SELECT * FROM pedidos p, detalle d, platos pla where p.CEDULA=$ceduEnv and p.ID_PEDIDOS=d.ID_PEDIDOS and d.ID_PLATO=pla.ID_PLATO")) {
			
			while ($consulta5 = mysql_fetch_array($consulta4)) {
				$item = $item+1;

				$pdf->Cell(15, 8, $item, 1, 0, 'C');
				$pdf->Cell(140, 8,$consulta5['NOMBRE'], 1);
				$pdf->Cell(25, 8, '$ '.$consulta5['PRECIO'], 1, 0,'C');
				$pdf->Ln(8);
				
			}
		}

		
	}

	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(149,8,'',0);
	$pdf->SetTextColor(255, 255, 255);
	$pdf->Cell(31,8,'Total: $ '.$Total,1, 0, 'C',  True);
	$pdf->Ln(30);
	$pdf->SetFont('Arial', '', 8);
	$pdf->SetTextColor(0, 0, 0);
	$pdf->Cell(50, 35, '', 0);
	$pdf->Cell(90, 30, '', 1);
    $pdf->Ln(9);
    $pdf->Cell(55,8);
	$pdf->Cell(80,8,'    _ _ _ _ _ _ _ _ _ _ _ _ _ _            _ _ _ _ _ _ _ _ _ _ _ _ _ _ _' ,0,2,'C');
	$pdf->Cell(5,8);
	$pdf->SetTextColor(255, 255, 255);
	$pdf->Cell(30,8,  'Cliente',1,0,'C',True);
	$pdf->Cell(11,8);
	$pdf->Cell(30,8,   'Encardado' ,1,0,'C',True);

	$pdf->Output();	

	
}else{
	$puerta='salir';

	}

}
?>
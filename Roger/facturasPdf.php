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
	$pdf->SetDrawColor(0,80,180);
    $pdf->SetFillColor(230,230,0);
	$pdf->Cell(197, 30, '', 1);
    $pdf->Ln(10);
	$pdf->Image('images/logo.png' , 90 ,14, 20 , 23,'PNG');
	$pdf->Cell(150, 10, '', 0);
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
	$pdf->Ln(15);
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Ln(20);
	$pdf->Cell(80, 8, '', 0);
	$pdf->Cell(100, 8, 'FACTURA', 0);
	$pdf->Ln(23);
	$pdf->SetFont('Arial', 'B', 8);

    
    $pdf->Cell(80, 35, '', 1);
    $pdf->Cell(30, 35, '', 0);
    $pdf->Cell(87, 35, '', 1);
    $pdf->Ln(4);
	$pdf->Cell(20, 8, 'Cedula:', 0);
    $pdf->SetFont('Arial', '', 8);
	$pdf->Cell(90, 8,$miCliente['CEDULA'], 0);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(30, 8, 'Nombre Empresa:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(20, 8, 'CARFOOD', 0);
	$pdf->Ln(4);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(20, 8, 'Nombre:', 0);
	$pdf->SetFont('Arial', '', 8);	
	$pdf->Cell(90, 8,$miCliente['NOMBRES'], 0);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(30, 8, 'Direccion:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(20, 8, 'Marcelino Champagnat, San Cayetano Alto', 0);
	$pdf->Ln(4);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(20, 8, 'Apellido:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(90, 8,$miCliente['APELLIDOS'], 0);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(30, 8, 'Telefono:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(20, 8, '2577616', 0);
	$pdf->Ln(4);	
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(20, 8, 'Telefono:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(90, 8,$miCliente['TELEFONO'], 0);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(30, 8, 'Email:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(20, 8, 'carfood@gmail.com', 0);
	$pdf->Ln(4);	
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(20, 8, 'Email:', 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(20, 8,$miCliente['EMAIL'], 0);
	$pdf->Ln(4);


	
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Ln(20);
	$pdf->Cell(70, 8, '', 0);
	$pdf->Cell(100, 8, 'LISTADO DE PRODUCTOS', 0);
	$pdf->Ln(23);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(15, 8, 'Item', 1);
	$pdf->Cell(70, 8, 'Nombre', 1);
	$pdf->Cell(70, 8, 'Detalle', 1);
	$pdf->Cell(25, 8, 'Precio', 1);

	$pdf->Ln(8);
	$pdf->SetFont('Arial', '', 8);
	$item = 0;
	$Total = 0;
	if($consulta2 = mysql_query("SELECT * FROM pedidos where $ceduEnv=CEDULA")){
		$consulta3 = mysql_fetch_array($consulta2);
		$Total = $consulta3['TOTAL'];
				
		if ($consulta4 = mysql_query("SELECT * FROM pedidos p, detalle d, platos pla where p.CEDULA=$ceduEnv and p.ID_PEDIDOS=d.ID_PEDIDOS and d.ID_PLATO=pla.ID_PLATO")) {
			
			while ($consulta5 = mysql_fetch_array($consulta4)) {
				$item = $item+1;

				$pdf->Cell(15, 8, $item, 1);
				$pdf->Cell(70, 8,$consulta5['NOMBRE'], 1);
				$pdf->Cell(70, 8, $consulta5['DETALLE'], 1);
				$pdf->Cell(25, 8, '$ '.$consulta5['PRECIO'], 1);
				$pdf->Ln(8);
				
			}
		}

		
	}

	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(149,8,'',0);
	$pdf->Cell(31,8,'Total: $ '.$Total,1);
	$pdf->Ln(60);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(50, 35, '', 0);
	$pdf->Cell(90, 30, '', 1);
    $pdf->Ln(9);
	$pdf->Cell(0,8,'_ _ _ _ _ _ _ _ _ _                      _ _ _ _ _ _ _ _ _ _' ,0,2,'C');
	$pdf->Cell(0,8,  $miCliente['NOMBRES'].' '.$miCliente['APELLIDOS'].'                                 Encardado'        ,0,2,'C');


	$pdf->Output();	

	
}else{
	$puerta='salir';

	}

}
?>
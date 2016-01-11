
<?php
require('conexion.php');
session_start();
$user = isset($_SESSION["miSession"]['USUARIO']) ? $_SESSION["miSession"]['USUARIO'] : null ;

if($user == ''){
	header('Location: logeo.php?error=2');
}

?>


<html>
<title>Gestion de Facturas</title>
<head>
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/Table.css">
	<img src="images/logo.png" id="logo">
	<div id="sesion"><a href='cerrarsesion.php'>cerrar session</a></div>

</head>


<body>

	<div class="container2">		
				            
				<header>
				
					<center><h1> <strong> Gestion de Facturas </strong> </h1> </center>								
						<div class="support-note">
						
					    </div>
					
				</header>
	</div>
		  		
		
		<div class="copyright text-center">
			<div  style="text-align:center">

                        <div class="CSS_Table_Example" style="text-align:center, width:200px;height:100px;">

							<table >
								<tr> 													
                                    <td>Detalle Factura</td>
									
								</tr>
								
                                <?php
								$consulta=mysql_query("SELECT * FROM cliente");
								if($consulta == FALSE) { 
    								die(mysql_error()); // error con la conecxion
								}
								while($consulta2 = mysql_fetch_array($consulta)){ 
								?>
                                <tr>
                                	<form class="form-4" role="form" method="post" action="facturasPdf.php">  
	                                	<p>                              		
	                                    <td><input type="radio" name="cedula" class="form-control" value=<?php echo $consulta2['CEDULA'];?>> <?php echo $consulta2['NOMBRES'];?> <?php echo $consulta2['APELLIDOS'];?></td>																		
										</p>
										
									
								</tr>
								
								<?php } ?>
                               
							</table>
							<input id="enviar" type="submit" name="submit" value="VerPrefactura">
							</form>
						

					</div>

			</div>		
        </div>
       
	</body>	

</html>

<?php
require('conexion.php');
session_start();
$user = isset($_SESSION["miSession"]['USUARIO']) ? $_SESSION["miSession"]['USUARIO'] : null ;

if($user == ''){
	header('Location: logeo.php?error=2');
}


?>
<a href='cerrarsesion.php'>cerrar session</a>

<html>
<head>
	<title>Gestion de Facturas</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/Table.css">
</head>
<body>	
	

	<div class="container">		
				            
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
									<td>Ver</td>
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
	                                    <td><input type="radio" name="cedula" class="form-control" value=<?php echo $consulta2['CEDULA'];?>> <?php echo $consulta2['NOMBRES'];?></td>																		
										</p>
										<p>
							        	<td></td>
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
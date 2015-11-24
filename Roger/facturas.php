
<?php

session_start();
$user = isset($_SESSION["miSession"]['USUARIO']) ? $_SESSION["miSession"]['USUARIO'] : null ;

if($user == ''){
	header('Location: logeo.php?error=2');
}

/*if($_SESSION["miSession"]['TIPO']==2){
	
	?>
	<div>
		<p><font color="#FFFFFF">Bienvenido: <?php echo $_SESSION["miSession"]['USUARIO'];?></font>
		<font color="#FFFFFF"> <?php echo " <a href='cerrarsesion.php'>cerrar session</a>";?></font></p>
	</div>
	<?php
	
}else{
    header('Location: logeo.php?error=1');
}*/	

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
									<td>
										# De Mesas
									</td>
									<td >
										Factura
									</td>
									<td>
										Ver
									</td>
								</tr>
								<tr>
									<td >
										 1
									</td>
									<td>
										Factura #1: a nombre de Pedro Carrion 
									</td>
									<td>
									  <a href="">ir a factura</a> 
									</td>
								</tr>
								<tr>
									<td >
										 2
									</td>
									<td>
										Factura #2: a nombre de Alejandra Perez
									</td>
									<td>
										<a href="">ir a factura</a>
									</td>
								</tr>
								<tr>
									<td >
										3
									</td>
									<td>
										Factura #3: a nombre de Diana Jaramillo
									</td>
									<td>
										<a href="">ir a factura</a>
									</td>
								</tr>
							</table>
					</div>

			</div>		
        </div>
       
	</body>	

</html>
<html>
<head>
	<title>Actualizar</title>
</head>
<body>
  <form action="otrp.php" method="POST" enctype="multipart/form-data">
  	<link type="text/css" href="./css/plat.css" rel="stylesheet" />
  	<h1>Actulizar Plato</h1>
	<?php 
		//Conexion con la base
		mysql_connect("localhost","root","");

		//selección de la base de datos con la que vamos a trabajar 
		mysql_select_db("food"); 

		echo '<FORM METHOD="POST" ACTION="otrp.php">Nombre<br>';

		//Creamos la sentencia SQL y la ejecutamos
		$sSQL="Select NOMBRE From platos Order By NOMBRE";
		$result=mysql_query($sSQL);
 			
		echo"<select name='NOMBRE' id='NOMBRE'>";
		while ($row=mysql_fetch_array($result))
				{
					echo '<option>'.$row["NOMBRE"];
				

				}
				echo "<INPUT NAME='Respuesta' id='Respuesta' TYPE=text VALUE='$row'><BR>";

		echo "</select>";
		 
	 ?>
	<td><input type="submit" name="button" id="button" value="Consultar" /></td>
	
	</form>
</body>
</html>
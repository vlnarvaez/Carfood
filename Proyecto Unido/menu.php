<html><meta charset="UTF-8">
<head>
	<title>Nuevo Menu</title>
	<LINK REL=StyleSheet HREF="css/estilos.css" TYPE="text/css" MEDIA=screen>
</head>


<head>
	<title></title>
</head>
<body>
<?php 
$link = mysql_connect("localhost", "root"); 
mysql_select_db("food", $link); 
$result = mysql_query("SELECT NOMBRE, DETALLE, PRECIO, TIPO_PLATO, IMAGEN FROM platos", $link); 
//$res=mysql_query("SELECT  IMAGEN FROM platos", $link)

echo "<table border = '1'>\n "; 
echo "<tr><td>Nombre</td><td>Detalle</td><td>Precio</td><td>Tipo de Plato</td><td>imagen</td></tr> \n"; 
while ($row = mysql_fetch_array($result) ){ 
		
       echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td><img src='$row[4]'></td></tr> \n"; 
       
} 
echo "</table> \n"; 

echo "";
?> 



</body>
</html>

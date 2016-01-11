<html><meta charset="UTF-8">
<?php  
include("conexion.php");
?>
<head>
	<title>Ingreso menus</title>
	<LINK REL=StyleSheet HREF="css/estilos.css" TYPE="text/css" MEDIA=screen>
		<script> 
function abrir(url) { 
open(url,'','top=300,left=600,width=600,height=350') ; 
} 
</script> 

</head>
<body >
	<div id="casillas">

		<h1>Registro de nuevo Menu</h1>
		 <LI><a  href="javascript:abrir('plato.php')">Nuevo Plato</a> 
		 <LI><a  href="menu.php">Nuevo Menu</a> 
		 <LI><a  href="javascript:abrir('actualizar.php')">Actualizar Plato</a> 
	</div>

</body>
</html>


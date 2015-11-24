<?php

session_start();

if($_SESSION["miSession"]['TIPO']==2){
	
	?>
	<div>
		<p><font color="black ">Bienvenido: <?php echo $_SESSION["miSession"]['USUARIO'];?></font>
		<font color="#FFFFFF"> <?php echo " <a href='cerrarsesion.php'>cerrar session</a>";?></font></p>
	</div>
	<?php
	
}else{
    header('Location: logeo.php?error=1');
}

?>
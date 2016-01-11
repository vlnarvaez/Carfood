
<?php
// Evitar los warnings the variables no definidas!!!
$err = isset($_GET['error']) ? $_GET['error'] : null ;

?>

<!DOCTYPE html>

<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/stylelogeo.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<script type="text/javascript" src="js/code.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		
    </head>
    <body>
        <div class="container">
		
			            
			<header>
				<div class="support-note">
			
					<center><h1> <strong> CARFOOD </strong> </h1> </center>								
					
				</div>
				
			</header>
			
			
			<div id="login">

				<form class="form-4" role="form" method="post" action="validar.php">
				
					<div id="login2">
				    <center><h1>Login</h1></center>
				    </div>
				    
					    <div id="datos" >
						    <p>
						        <a class="btn btn-primary"><i class="fa fa-user fa-fw"><label for="login">Ingrese usuario</label></i></a>					       
						        <input type="text" name="user" class="form-control" placeholder="ingresar usuario" required autofocus>
						    </p>
						    <p>
						        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span><label for="password">Ingrese contraseña</label>						       
						        <input type="password" name="pass" class="form-control" placeholder="ingresar contraseña" required>
						    </p>

						    <p>
						        <input id="enviar" type="submit" name="submit" value="Entrar">
						        
						    </p>      
						 </div>  
						   
				</form>​
				<?php 
					if($err==1){
						echo "Usuario o Contraseña Erróneos <br />";
					}
					if($err==2){
						echo "Debe iniciar sesion para poder acceder el sitio. <br />";
					}
				?>
			</div>	
			
			
        </div>
    </body>
</html>
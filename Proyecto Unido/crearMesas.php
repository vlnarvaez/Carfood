<!DOCTYPE>
<?php
    include("coneccion/config.php");
    include("coneccion/clases_mysql.php");
    $miconexion = new DB_mysql;
    $miconexion->conectar($dbname,$dbhost,$dbuser,$dbpass);
    error_reporting(0);
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>CarFood </title>

        <!-- Custom CSS -->
        <link href="css/estiloGM.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/contact_me.js"></script>
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/script.js"></script>
    </head>
    
    <body>
        
        <section id="formularioDatos">
            <section id="logo2">
                <img  height="100"  alt="100" src="images/logo-carfood.png" />  
            </section>
            
            <section id ="formulario2">
                <form name="registro" action="registrarMesa.php" method="POST"><br><br>
                    <label><b>Numero de Mesa:<br></label>
                    <input type="text" name="numMesa" required placeholder="Numero de mesa"><br><br>
                    
                    <label>Estado:<br></label> 
                    <select name="estado"><option>Seleccione</option><option value='DISPONIBLE'>DISPONIBLE</option> <option value='OCUPADA'>OCUPADA</option></select> <br><br>
                    
                    <label>Capacidad:<br></label> 
                    <input type="text" name="capacidad" required placeholder="Capacidad"><br><br>
                    
                    <section id="buttonRegistrar">
                        <button id="b1" type="submit"><a>REGISTRAR</a></button>  
                    </section>
                </form>

                
            </section>
         </section>
    </body>
</html>
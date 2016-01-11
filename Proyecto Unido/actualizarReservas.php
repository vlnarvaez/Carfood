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
        <section id="formularioDatos2">
            <section id="logo4">
                <aside><a href="gestionMesas.php"><img height="100"  alt="100" src="images/logo-carfood.png"></a><br/></aside> 
            </section>
            <section id ="formulario3">
                <?php                 
                error_reporting(0);
                    $a=$_POST['cedula'];
                    $sql="SELECT CEDULA, NOMBRES, APELLIDOS, TELEFONO, EMAIL FROM CLIENTES WHERE CEDULA = '$a'";
                    $miconexion->consulta($sql);
                    $lista = "";
                    $lista = $miconexion->consulta_lista();
            
                    if ($a!==NULL) {                                 
                        $c=$lista[0];
                        $d=$lista[1];
                        $e=$lista[2];
                        $f=$lista[3];
                        $g=$lista[4];
                    }?>

                 <form action="actualizacionReserva.php" method="post">
                    <label><b>Cedula:</label><br><input name="cedula" value="<?php echo $c ?>"><br><br>
                    <label>Nombres:</label><br><input name="nombres" value="<?php echo $d ?>"><br><br>
                    <label>Apellidos:</label><br><input name="apellidos" value="<?php echo $e ?>"><br><br>
                    <label>Telefono:</label><br><input name="telefono" value="<?php echo $f ?>"><br><br>
                    <label>Email:</label><br><input name="email" value="<?php echo $g ?>"><br><br>

                    <section id="butttonActualizarReserva">
                        <button id="b1" type="submit">ACTUALIZAR</button> 
                    </section>
                    
                </form> 
            </section>
        </section>
    </body>
</html>
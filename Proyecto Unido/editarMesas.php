<!DOCTYPE>
<?php
    include("coneccion/config.php");
    include("coneccion/clases_mysql.php");
    $miconexion = new DB_mysql;
    $miconexion->conectar($dbname,$dbhost,$dbuser,$dbpass);
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
                    $a=$_POST['idMesa'];
                    $sql="SELECT ID_MESA, ESTADO, CAPACIDAD FROM MESAS WHERE ID_MESA = '$a'";
                    $miconexion->consulta($sql);
                    $lista = "";
                    $lista = $miconexion->consulta_lista();
                    if ($a!==NULL) {
                        error_reporting(0);                                                           
                        $c=$lista[0];
                        $d=$lista[1];
                        $e=$lista[2];
                    } 
                ?>
                <form action="actualizacionMesa.php" method="post">
                    <label><b>Numero de mesa:</label><br><input name="id_mesa" value="<?php echo $c ?>"><br><br>
                    <label>Estado:</label><br><select name="estado"><option>Seleccione</option><option value='DISPONIBLE'>DISPONIBLE</option> <option value='OCUPADA'>OCUPADA</option></select> <br><br>
                    
                    <label>Capacidad:</label><br><input name="capacidad_mesa" value="<?php echo $e ?>"><br><br>
                    <button name="actualizar" type="submit">ACTUALIZAR</button>
                </form>
                </section>
            </section>
    </body>
</html>
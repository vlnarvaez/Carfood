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
            <section id="logo3">
                <aside><a href="gestionMesas.php"><img height="100"  alt="100" src="images/logo-carfood.png"></a><br/></aside>  
            </section>
            <section id ="formulario2">
            <?php 
                $sql = "SELECT ID_MESA FROM MESAS WHERE ESTADO ='DISPONIBLE'"; 
                $res1=mysql_query($sql );
            ?>
                <form name="registro" action="registrarCliente2.php" method="POST">
                    <label><b>Cedula:<br></label> <input type="text" name="cedula" required placeholder="Cedula"><br><br>
                    <label><b>Nombres:<br></label> <input type="text" name="nombres" required placeholder="Nombres"><br><br>
                    <label><b>Apellidos:<br></label> <input type="text" name="apellidos" required placeholder="Apellidos"><br><br>
                    <label><b>Telefono:<br></label> <input type="text" name="telefono" required placeholder="Telefono"><br><br>
                    <label><b>Email:<br></label> <input type="text" name="email" required placeholder="email@email.com"><br><br>
                    <label><b>Num Mesa:<br></label> 
                    <select name="numMesa" id="NumMesaR">
                        <option selected>Seleccione</option>
                            <?php while($row=mysql_fetch_array($res1)){?>
                        <option value="<?php echo $row['ID_MESA']?>"> <?php echo htmlentities($row['ID_MESA']);?></option><?php } ?>
                    </select>
                                                                        
                    <section id="buttonRegistrar">
                        <button id="reservar" type="submit" name="reservar">RESERVAR</button>  
                    </section>
                </form>  
               
            </section>
         </section> 
    </body>
</html>
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
        <script language="JavaScript" type="text/javascript" src="ajax.js"></script>

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
            <section id ="formulario22">
                <form name="registro" action="#" onsubmit="MostrarConsulta('crearReservas2.php'); return false" method="POST">
                   
                    <?php
                        echo "<label><b>Cedula:<br></label> <input type='text' name='cedu' id='cedu' required placeholder'Cedula'><br><br>";
                        
                        $sql=mysql_query("SELECT cedula, nombres, apellidos, telefono, email FROM clientes WHERE cedula= 'cedu' ");

                        while($row = mysql_fetch_array($sql)){
                            $cedula = $row['cedula']; 
                            $nombres = $row['nombres'];
                            $apellidos = $row['apellidos'];
                            $telefono = $row['telefono'];
                            $email = $row['email'];
                        }
                    ?>
                    <label><b>Nombres:<br></label> <input type="text" name="nombres" required placeholder="Nombres" value="<?php echo $nombres ?>"><br><br>
                    <label><b>Apellidos:<br></label> <input type="text" name="apellidos" required placeholder="Apellidos" value="<?php echo $apellidos ?>"><br><br>
                    <label><b>Telefono:<br></label> <input type="text" name="telefono" required placeholder="Telefono" value="<?php echo $telefono ?>"><br><br>
                    <label><b>Email:<br></label> <input type="text" name="email" required placeholder="email@email.com" value="<?php echo $email ?>"><br><br>
                                      
                    <label><b>Num Mesa:<br></label> 
                    <?php 
                    $sql = "SELECT ID_MESA FROM MESAS WHERE ESTADO ='DISPONIBLE'"; 
                    $res1=mysql_query($sql );
                    ?>
                        <select name="numMesa" id="NumMesaR">
                            <option selected>Seleccione</option>
                            <?php while($row=mysql_fetch_array($res1))
                            {?>
                            <option value="<?php echo $row['ID_MESA']?>"> <?php echo htmlentities($row['ID_MESA']);?></option>
                            <?php } ?>
                        </select>
                                                                        
                    <section id="buttonRegistrar">
                        <button id="reservar" type="submit" name="reservar" >RESERVAR</button>  
                    </section>

                </form>
            </form>                  
            </section>
         </section> 
    </body>
</html>
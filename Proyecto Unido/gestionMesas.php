<!DOCTYPE>

<?php
    include("coneccion/config.php");
    include("coneccion/clases_mysql.php");
    $miconexion = new DB_mysql;
    $miconexion->conectar($dbname,$dbhost,$dbuser,$dbpass);
    session_start();
if($_SESSION["miSession"]['TIPO_USUARIO']==1){
   
    ?>
    <div>
        <p><font color="#FFFFFF">Bienvenido: <?php echo $_SESSION["miSession"]['USUARIO'];?></font>
        <font color="#FFFFFF"> <?php echo " <a href='cerrarsesion.php'>cerrar session</a>";?></font></p>
    </div>
    <?php
}else{
    header('Location: logeo.php?error=1');
}
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
        <!-- Start Logo Section -->
        <section id="pag">
            <section id="logo"> 
                <aside><a href="gestionMesas.php"><img height="200"  alt="130" src="images/logo-carfood.png"></a><br/></aside> 
            </section>
            
            <section id="busqueda"> 
                <section id="subtitulo">
                    <h1><b>Numero de Mesa:</b></h1>
                </section> 
                
                <?php 
                    $sql = "SELECT ID_MESA FROM MESA"; 
                    $res1=mysql_query($sql);
                ?>
                <form action="gestionMesas.php" method="POST">
                    <select name="numMesa" >
                    <option selected>Seleccione</option>
                    <?php while($row=mysql_fetch_array($res1))
                    {?>
                    <option value="<?php echo $row['ID_MESA']?>"> <?php echo htmlentities($row['ID_MESA']);?></option>
                    <?php } ?>
                    </select>

                    <section id="buttonConsultar">
                        <button id="b1" type="submit"><a>CONSULTAR</a></button>  
                    </section>
                </form>

            </section>

            <section id="tabla">
                 <table style="width:90%">
                    <tr>
                        <td><b>NUM MESA</td>
                        <td><b>CAPACIDAD</td>
                        <td><b>ESTADO</td> 
                        <td><b>RESERVA</td>
                        <td><b>▼</td>
                        <td><b>▼</td>                               
                    </tr>
              
                    <tr>
                    <td>
                        <?php
                        error_reporting(0);
                        $a=$_POST['numMesa'];
                            $sql1 = "SELECT ID_MESA AS '' FROM MESA WHERE ID_MESA ='$a'";
                            $miconexion->consulta($sql1); 
                            $miconexion->verconsultacontroles(); 
                        ?>
                    </td>

                    <td>
                        <?php
                            $sql1 = "SELECT CAPACIDAD AS '' FROM MESA WHERE ID_MESA ='$a'";
                            $miconexion->consulta($sql1); 
                            $miconexion->verconsultacontroles(); 
                        ?>
                    </td>

                    <td>
                        <?php
                            $sql1 = "SELECT ESTADO AS '' FROM MESA WHERE ID_MESA ='$a'";
                            $miconexion->consulta($sql1);
                            $miconexion->verconsultacontroles(); 

                        ?>
                    </td>
                    <td><a>
                        <?php
                            $sql1 = "SELECT ESTADO FROM MESA WHERE ID_MESA = '$a'";
                            $miconexion->consulta($sql1); 
                            $res = mysql_query($sql1);
                            $row=mysql_fetch_array($res);
                            
                            if ($row[0] == 'OCUPADA') {
                                    #echo '<script>alert("MESA OCUPADA...")</script>';
                                    
                                    $sql1 = "SELECT R.CEDULA FROM PEDIDOS R, MESA M WHERE R.ID_MESA = '$a' AND M.ID_MESA = R.ID_MESA";

                                    $res1=mysql_query($sql1);
                                    ?>
                                    <form  action="actualizarReservas.php" method="POST"><?php
                                        error_reporting(0); ?>

                                        <select name="cedula" id="Cedula" style="background: white; border-color: white;">
                                            <?php 
                                            while($row=mysql_fetch_array($res1)){
                                            ?>
                                            <option value="<?php echo $row['CEDULA']?>"> <?php echo htmlentities($row['CEDULA']);?></option>
                                            <?php } ?>
                                        </select>
                                        <section id="buttonInformacion"  >
                                            <button id="b1" type="submit">INFORMACION</button> 
                                        </section>
                                    </form>
                                    <?php
                            } 
                            if ($row[0] == 'DISPONIBLE') {

                                    $sql1 = "SELECT ID_MESA, CEDULA FROM PEDIDOS WHERE ID_MESA = '$a'";
                                    $res1=mysql_query($sql1);
                                    ?>
                                    <form  action="crearReservas2.php" method="POST"><?php
                                        error_reporting(0); ?>

                                        <select name="cedula" id="Cedula" style="background: white; border-color: white;">
                                            <?php 
                                            while($row=mysql_fetch_array($res1)){
                                            ?>
                                            <option value="<?php echo $row['CEDULA']?>"> <?php echo htmlentities($row['CEDULA']);?></option>
                                            <?php } ?>
                                        </select>
                                        <section id="buttonInformacion">
                                            <button id="b1" type="submit">RESERVAR</button> 
                                        </section>
                                    </form>
                            <?php
                            } 
                        ?>   
                    </td>
                        
                    <td>
                        
                         <form  action="editarMesas.php" method="POST"><?php
                            error_reporting(0);
                            
                            $sql1 = "SELECT ID_MESA FROM MESA WHERE ID_MESA = '$a'";
                            $res1=mysql_query($sql1);
                            ?> 

                                <select name="idMesa" id="idMesa" style="background: white; border-color: white;">
                                    <?php 
                                    while($row=mysql_fetch_array($res1)){
                                    ?>
                                    <option value="<?php echo $row['ID_MESA']?>"> <?php echo htmlentities($row['ID_MESA']);?></option>
                                    <?php } ?>
                                </select>

                            <section id="buttonEditar">
                                <button id="b1" type="submit"><a>EDITAR</a></button>  
                            </section>
                        </form>
                    </td>

                    <td> 
                        <form action="eliminarMesas.php" method="POST"> <?php
                            error_reporting(0);
                            
                            $sql1 = "SELECT ID_MESA FROM MESAS WHERE ID_MESA = '$a'";
                            $res1=mysql_query($sql1);
                            ?> 

                                <select name="idMesa" id="idMesa" style="background: white; border-color: white;">
                                    <?php 
                                    while($row=mysql_fetch_array($res1)){
                                    ?>
                                    <option value="<?php echo $row['ID_MESA']?>"> <?php echo htmlentities($row['ID_MESA']);?></option>
                                    <?php } ?>
                                </select>

                            <section id="buttonEliminar">
                                <button id="b1" type="submit"><a>ELIMINAR</a></button>  
                            </section>
                        </form>
                    </td>                        
                    </tr>

                </table>
            </section>
            <section id="men">
                <ul id="navigationMenu" name="icon">
                     <button id="button">
                        <input type="image" name="buscar1" value="buscar1" src="images/icon/fav1.png" />
                        <li><span><a href="javascript:void(0)" onclick="window.open('crearMesas.php','','width=600,height=600,noresize')">CREAR MESA</a></span></li>
                        <li><span><a href="javascript:void(0)" onclick="window.open('crearReservas.php','','width=600,height=665,noresize')">CREAR RESERVA</a><br></span></li>
                    </button>
                </ul>
            </section>
   
        </section>  

    </body>
    
</html>
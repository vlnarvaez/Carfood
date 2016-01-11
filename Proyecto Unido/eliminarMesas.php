<!DOCTYPE>
<?php
    include("coneccion/config.php");
    include("coneccion/clases_mysql.php");
    $miconexion = new DB_mysql;
    $miconexion->conectar($dbname,$dbhost,$dbuser,$dbpass);
    error_reporting(0);

    $a=$_POST['idMesa']; echo $a."asdbkasjdkasjd";

        $sql="DELETE FROM realizan WHERE ID_MESA='$a'";
        $miconexion->consulta($sql);

        $sql2="DELETE FROM mesas WHERE ID_MESA='$a'";
        $miconexion->consulta($sql2);

        echo '<script>alert("Se elimino la mesa satisfactoriamente la informacion...")</script>';
        echo "<script>location.href='gestionMesas.php'</script>"; 
?>
     
                    
    
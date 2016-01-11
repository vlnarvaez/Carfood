<?php
    include("coneccion/config.php");
    include("coneccion/clases_mysql.php");

    extract($_POST);
    $miconexion = new DB_mysql;
    $miconexion->conectar($dbname,$dbhost,$dbuser,$dbpass);

    $b=$_POST['numMesa']; 
    $c=$_POST['estado'];
    $d=$_POST['capacidad'];

    $sql="INSERT INTO mesas (ID_MESA, ESTADO, CAPACIDAD) VALUES ('$b','$c','$d')" ;  
    $miconexion->consulta($sql);
    
    echo '<script>alert("Se registro satisfactoriamente la informacion...")</script>';
    echo "<script>location.href='gestionMesas.php'</script>"; 
?>
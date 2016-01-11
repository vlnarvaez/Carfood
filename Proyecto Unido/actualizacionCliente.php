<?php
    include("coneccion/config.php");
    include("coneccion/clases_mysql.php");

    extract($_POST);
    $miconexion = new DB_mysql;
    $miconexion->conectar($dbname,$dbhost,$dbuser,$dbpass);

    $b=$_POST['cedula'];
    $sql="INSERT INTO clientes VALUES CEDULA ='$b', NOMBRES ='$nombres', APELLIDOS='$apellidos', TELEFONO='$telefono', EMAIL='$email' where CEDULA='$b'" ;  
    $miconexion->consulta($sql);
    echo '<script>alert("Se regitro satisfactoriamente la informacion...")</script>';
    echo "<script>location.href='gestionMesas.php'</script>"; 
?>
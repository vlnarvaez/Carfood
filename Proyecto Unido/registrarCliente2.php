<?php
    include("coneccion/config.php");
    include("coneccion/clases_mysql.php");

    extract($_POST);
    $miconexion = new DB_mysql;
    $miconexion->conectar($dbname,$dbhost,$dbuser,$dbpass);

    $b=$_POST['cedula']; 
    $c=$_POST['nombres'];
    $d=$_POST['apellidos'];
    $e=$_POST['telefono'];
    $f=$_POST['email'];
    $G=$_POST['NumMesaR'];
    

    $sql="INSERT INTO clientes (CEDULA, NOMBRES, APELLIDOS, TELEFONO, EMAIL) VALUES ('$b','$c','$d','$e','$f')" ;  
    $miconexion->consulta($sql);

    $sql="INSERT INTO realizan (CEDULA, ID_MESA) VALUES ('$b','$g')" ;  
    $miconexion->consulta($sql);
    echo '<script>alert("Se registro satisfactoriamente la informacion...")</script>';
    echo "<script>location.href='gestionMesas.php'</script>"; 
?>
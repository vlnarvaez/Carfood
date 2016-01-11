<?php
    include("coneccion/config.php");
    include("coneccion/clases_mysql.php");

    extract($_POST);
    $miconexion = new DB_mysql;
    $miconexion->conectar($dbname,$dbhost,$dbuser,$dbpass);

    $b=$_POST['cedula'];
    $sql="UPDATE clientes set CEDULA ='$b', NOMBRES ='$nombres', APELLIDOS='$apellidos', TELEFONO='$telefono', EMAIL='$email' WHERE CEDULA='$b'" ;  
    $miconexion->consulta($sql);

    echo '<script>alert("Se actualizo satisfactoriamente la informacion...")</script>';
    echo "<script>location.href='gestionMesas.php'</script>"; 
?>
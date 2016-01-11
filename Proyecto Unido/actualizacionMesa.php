<?php
    include("coneccion/config.php");
    include("coneccion/clases_mysql.php");

    extract($_POST);
    $miconexion = new DB_mysql;
    $miconexion->conectar($dbname,$dbhost,$dbuser,$dbpass);


    $a=$_POST['id_mesa'];
    $sql="update mesas set ID_MESA ='$a', ESTADO ='$estado_mesa', CAPACIDAD='$capacidad_mesa' where ID_MESA='$a'" ; 
    $miconexion->consulta($sql);
    echo '<script>alert("Se actualizo satisfactoriamente la informacion...")</script>';
    echo "<script>location.href='gestionMesas.php'</script>"; 

?>
<?php
include ("conexion.php");

$usuarioIng=$_POST['user'];
$passIng=$_POST['pass'];
session_start();
$consulta=mysql_query("select * from usuarios");
$puerta='continuar';

while ($filas=mysql_fetch_array($consulta) and $puerta='continuar') {
    $ID_USUARIO=$filas['ID_USUARIO'];
    $USUARIO=$filas['USUARIO'];
    $CONTRASENIA=$filas['CONTRASENIA'];
    $TIPO=$filas['TIPO'];

    if(isset($usuarioIng) and isset($passIng)){
        if($USUARIO==$usuarioIng and $CONTRASENIA==$passIng){
            echo 'bienvenido'.$usuario;                       
            $miSession=array('ID_USUARIO' => $ID_USUARIO, 'USUARIO' => $USUARIO, 'CONTRASENIA' => $CONTRASENIA, 'TIPO' => $TIPO);
            $_SESSION['miSession']=$miSession; 

            if($_SESSION["miSession"]['TIPO']==1){
                echo 'tiene permiso <br>';
                header("Location: GestionGeneral.php");
            }else{
                header("Location: parteChef.php");   
            }          
            $puerta='salir';
            exit;

        }else{
            $resultado='no';
        }

    }

}
if($resultado=='no'){
    header("Location: logeo.php");  
    

}
?>


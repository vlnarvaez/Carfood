<?php
include ("conexion.php");

$usuarioIng=$_POST['user'];
$passIng=$_POST['pass'];
session_start();
$consulta=mysql_query("select * from USUARIOS");
$puerta='continuar';

while ($filas=mysql_fetch_array($consulta) and $puerta='continuar') {
    $ID_USUARIO=$filas['ID_USUARIO'];
    $USUARIO=$filas['USUARIO'];
    $CONTRASENIA=$filas['CONTRASENIA'];
    $TIPO_USUARIO=$filas['TIPO_USUARIO'];

    if(isset($usuarioIng) and isset($passIng)){
        if($USUARIO==$usuarioIng and $CONTRASENIA==$passIng){
            echo 'bienvenido'.$usuario;                       
            $miSession=array('ID_USUARIO' => $ID_USUARIO, 'USUARIO' => $USUARIO, 'CONTRASENIA' => $CONTRASENIA, 'TIPO_USUARIO' => $TIPO_USUARIO);
            $_SESSION['miSession']=$miSession; 

            if($_SESSION["miSession"]['TIPO_USUARIO']==1){
                echo 'tiene permiso <br>';
                header("Location: GestionGeneral.php");
            }else{
                header("Location: chef.php");   
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


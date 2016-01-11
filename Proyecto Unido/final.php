<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php 

	require_once('conexion.php');	
	//$id=$_POST['id'];
	$nombre=$_POST['nombre'];
	//$Respuesta=$_POST['Respuesta'];
	$desc=$_POST['desc'];
	$precio=$_POST['precio'];
	$TIPO_PLATO=$_POST['tipo'];
	$h=$_POST['h'];
	$mi_usuario='root';
	$mi_password='';
	$dir_destino = 'imag_plato/';
	$imagen_subida = $dir_destino . basename($_FILES['foto']['name']);
	echo "$h";
	//Variables del metodo POST

	if(!is_writable($dir_destino)){
	    echo "no tiene permisos";
	}else{
	    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
	        if (move_uploaded_file($_FILES['foto']['tmp_name'], $imagen_subida)) {
	        	$img = "http://localhost:8080/vistas/".$imagen_subida;
	           $save=mysql_query("UPDATE platos set NOMBRE = '$nombre',DETALLE ='$desc',PRECIO = '$precio',TIPO_PLATO ='$TIPO_PLATO',IMAGEN='$img' where ID_PLATO = '$h' ");
	          // $save=mysql_query("INSERT into platos (ID_PLATO, NOMBRE,DETALLE,PRECIO,TIPO_PLATO,IMAGEN) value ('$id','$nombre','$desc','$precio','$Respuesta', '$img')");
	           echo "SYBUIII";
	        } 
	    }
	}    
	?>
	echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
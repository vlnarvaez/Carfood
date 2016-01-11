<html>
<head>
	<title>Actulizar</title>
</head>
<body n>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
	   <h1>Actulizar Plato</h1>
        <div id="act">
            <form action="final.php" method="POST" enctype="multipart/form-data">
                
            <?php 
            $host="localhost";
            $user="root";
            $passwd="";
            $db="food";

                //Creamos la conexión

            $link = mysql_connect($host, $user, $passwd); 
            mysql_select_db($db, $link); 

            $sel=$_POST['NOMBRE'];
            
            $sql = mysql_query("select *  from platos where NOMBRE='$sel' " ,$link) or die(mysql_error());
               //Preguntamos si nuestra consulta da algun resultado
                if(mysql_num_rows($sql)>0)
                {
                     echo "<html><head><title>ejemplo</title></head><body>
                     <form action='final.php' method='post'>
                     ";
                     $row=mysql_fetch_array($sql);
                     echo "
                     <input type='text' name='h' value='".$row['ID_PLATO']."'>
                     <input type='text' name='nombre' value='".$row['NOMBRE']."'>
                     <input type='text' name='desc' value='".$row['DETALLE']."'>
                     <input type='text' name='precio' id='precio' value='".$row['PRECIO']."'>
                     <input type='text' name='tipo' value='".$row['TIPO_PLATO']."'>
                     <img src='".$row['IMAGEN']."'>
                       <input id='file_url' type='file' name='foto' id='foto'><br />
                     <input type='submit' name='ir' value='Actualizar'>
                     </form>
                      </body></html>
                     ";
                }
             ?>            
            </form>
        </div>
</body>
</html>
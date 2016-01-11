<!DOCTYPE html>
<?php  
include("conexion.php");
?>
<html lang="es">
<head>
    <title>Formulario</title>
    <meta charset="utf-8">
    <link type="text/css" href="./css/plat.css" rel="stylesheet" />
</head>
 
<body background=("img/plat.jpg")>
 	
    <form action="inser.php" method="POST" enctype="multipart/form-data">
    <TABLE border="1">
      <TR><TD>
        <TABLE>
          
          <TR>
            <TD align="right">Id de Plato:</TD>
            <TD align="left"><INPUT type="text" name="id" id="id" size="8"></TD></TR>
            <TR>
            <TD align="right">Nombre de Plato:</TD>
            <TD align="left"><INPUT type="text" name="nombre" id="nombre" size="25"></TD></TR> 
            <TR>
            <TD align="right">Precio:</TD>
            <TD align="left"><INPUT type="text" name="precio" id="precio" size="8"></TD>
          </TR>

          <TR>
            <TD align="right">Tipo:</TD><TD align="left"><BR>
            Desayunos<INPUT NAME="Respuesta" id="Respuesta" TYPE=RADIO VALUE="Desayuno"><BR>
            Almuerzos<INPUT NAME="Respuesta" id="Respuesta" TYPE=RADIO VALUE="Almuerzo"><BR>
            Meriendas<INPUT NAME="Respuesta" id="Respuesta" TYPE=RADIO VALUE="Meriendas"><BR>
            Plato a la Carta<INPUT NAME="Respuesta" id="Respuesta" TYPE=RADIO VALUE="Plato a la Carta"><BR>
          </TR> 
          <TR>
              <TD align="right">Descripcion del Plato:</TD><TD align="left">
              <TEXTAREA rows="5" cols="30" name="desc" id="desc"></TEXTAREA><BR>
          </TD>
          </TR>
          <TR>
            <TD>
              <input id="file_url" type="file" name="foto"><br />           
            </TD>
            
          </TR>
          <TR >
            <td><input type="submit" name="button" id="button" value="Enviar" /></td>
          </TR>
        </TABLE>
      </TD></TR>
    </TABLE>
    </form>
</body>
 
</html>

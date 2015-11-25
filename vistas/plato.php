<!DOCTYPE html>
<html lang="es">
<head>
    <title>Formulario</title>
    <meta charset="utf-8">
    <link type="text/css" href="./css/plat.css" rel="stylesheet" />
</head>
 
<body background=("img/plat.jpg")>
 	<FORM name="login" action="http://www.tecnun.es/cgi-bin/ii/CGI0.exe" method="POST" target="resultado">
    <TABLE border="1">
      <TR><TD>
        <TABLE>
          <TR>
            <TD align="right">Nombre de Plato:</TD><TD align="left"><INPUT type="text" name="username" size="25"></TD>
          </TR>

          <TR>
            <TD align="right">Tipo:</TD><TD align="left">
            Desayunos<INPUT NAME="Respuesta" TYPE=RADIO VALUE="mal"><BR>
			Almuerzos<INPUT NAME="Respuesta" TYPE=RADIO VALUE="bien"><BR>
			Meriendas<INPUT NAME="Respuesta" TYPE=RADIO VALUE="mal"><BR></TD>
          </TR>
          <TR>
            <TD align="right">Descripcion del Plato:</TD><TD align="left">
            	<TEXTAREA rows="5" cols="30" name="txtsugerencias"></TEXTAREA><BR>
      			<INPUT type="hidden" name="identificador" value="Z87X09RF"><BR>
        	</TD>
          </TR>
          <TR >
            <TD colspan="2" align="center"><INPUT type="submit" value="Enviar">&nbsp;&nbsp;&nbsp;</TD>
          </TR>
        </TABLE>
      </TD></TR>
    </TABLE>
    
</body>
 
</html>
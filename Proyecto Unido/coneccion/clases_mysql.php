<?php
class DB_mysql
{
	/*Variables de conexión*/
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;

	/*Variable de control de la conexion y consulta*/
	var $Conexion_ID=0;
	var $Consulta_ID=0;

	var $Errno = 0;
	var $Error = 0;

	function conectar($db, $host, $user, $pass){
		if($db != "") $this->BaseDatos=$db;
		if($host != "") $this->Servidor=$host;
		if($user != "") $this->Usuario=$user;
		if($pass != "") $this->Clave=$pass;

		$this->Conexion_ID = mysql_connect($this->Servidor,$this->Usuario,$this->Clave);
		if(!$this->Conexion_ID){
			$this->Error = "La conexion con el servidor a fallado..";
			return 0;
		}

		if(!mysql_select_db($this->BaseDatos,$this->Conexion_ID)){
			$this->Error = "No se pudo conectar a la db".$this->BaseDatos;
			return 0;
		}

		return $this->Conexion_ID;
	}

	/*Funcion de ejecucion de la sentencia sql*/
	function consulta($sql){
		if($sql==""){
			$this->Error="No hay ninguna sentencia sql";
			return 0;
		} 
		//ejecutamos la consulta
		$this->Consulta_ID=mysql_query($sql,$this->Conexion_ID);
		return $this->Consulta_ID;
	}

	function insertar($sql){
		if($sql==""){
			$this->Error="No hay ninguna sentencia sql";
			return 0;
		} 
		//ejecutamos la consulta
		$this->Consulta_ID=mysql_query($sql,$this->Conexion_ID);
		return $this->Consulta_ID;
	}
	function eliminar($sql){
		if($sql==""){
			$this->Error="No hay ninguna sentencia sql";
			return 0;
		} 
		//ejecutamos la consulta
		$this->Consulta_ID=mysql_query($sql,$this->Conexion_ID);
		return $this->Consulta_ID;
	}

	/*Devuelve el numero de campos de la consulta*/
	function numcampos(){
		return mysql_num_fields($this->Consulta_ID);
	}

	/*Devuelve el nombre de los campos de la culsulta*/
	function nombrecampo($numcampos){
		return mysql_field_name($this->Consulta_ID, $numcampos);
	}

	/*Muestra los datos de la tabla*/
	function verconsulta(){
		echo "<table border='1'>";
		echo "<tr>";
		for($i=0; $i<$this->numcampos();$i++){
			echo utf8_encode("<td>".$this->nombrecampo($i)."</td>");
		}
		echo "</tr>";
		while ($row = mysql_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i <$this->numcampos(); $i++) { 
				echo utf8_encode("<td>".$row[$i]."</td>");
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	function  verconsultacontroles(){
			echo "<table class='normal'>";
			echo "<tr>";
			for($i=0; $i<$this->numcampos(); $i++){
				echo utf8_encode("<td>".$this->nombrecampo($i)."</td>");
			}
			echo "</tr>";
			while($row= mysql_fetch_array($this->Consulta_ID)){
				echo "<tr>";
				for($i=0; $i<$this->numcampos(); $i++){
					echo utf8_encode("<td>".$row[$i]."</td>");
				}
				echo "</tr>";
			}
			echo "</table>";
		
	}
	function consulta_lista(){
		while ($row = mysql_fetch_array($this->Consulta_ID)){
			for ($i=0; $i < $this->numcampos(); $i++){
				$row[$i];
				
			}
			return $row;
		}
	}

	function cerrarconexion()
	{
		mysql_close($this->Conexion_ID);
		echo $this->Conexion_ID."asdasdasdasdas";
	}
	
}
?>
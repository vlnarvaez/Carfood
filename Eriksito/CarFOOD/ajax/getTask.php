<?php
$db_name  = 'test';
$hostname = '127.0.0.1';
$username = 'root';
$password = 'esantiago';
$dbh = new PDO("mysql:host=$hostname;dbname=$db_name", $username, $password);
$sql = 'SELECT nombre, precio FROM platos';
$stmt = $dbh->prepare( $sql );
$stmt->execute();
$result = $stmt->fetchAll( PDO::FETCH_ASSOC );
$json = json_encode( $result );
echo $json;
$file= 'platos.json';
file_put_contents($file, $json);
?> 

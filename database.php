<?php
// variables de conexion
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_login';
// Establecemos la conexion con la base de datos
$conn = mysqli_connect($server, $username, $password, $database);

// Comprobamos que la conexion sea exitosa
try {
    $connect = new PDO("mysql:host=$server;dbname=$database",$username,$password);
} catch (PDOException $e) {
    die('connected failed:'.$e->getMessage());
}

?>
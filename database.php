<?php 
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'phploginphp';

    // Estas son variables para la conexion  a la base de datos

    // Intentando la conexion

    try
    {
        // Esta instancia a PDO me ayuda a conectar a la base de datos
        // Ojo con los espacios en mysql:host ??  OJOJOJOJ
        $conexion = new PDO( "mysql:host=$server;dbname=$database;",$username,$password);

        // Esa variable llamada conexion es la que me va a ayudar a conectarme a la base de 
        // datos
    }
    catch (PDOException $e) 
    {
        die('Connection Failed: ' . $e->getMessage());
    }


?>
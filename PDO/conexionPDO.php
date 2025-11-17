<?php
    require_once "configDB.php";


    //el primer parametro se envia de esta forma en caso de que queramos conectar con una base de datos mySql
    $conexion = new PDO("mysql:host=".SERVIDOR.";dbname=".BBDD."",USUARIO,CLAVE);

//Las excepciones en PDO son PDOException (para try catch)

    $resultado = $conexion->query('SELECT * FROM foo'); //las querys se envian igual que en mysqli


    //cerrado de la conexion de pdo (se cierra todo lo que tenga que ver con la instancia) :

    $conexion = null;
    $resultado = null;
?>
<?php

    require 'configDB.php';

    $conexion = new mysqli(SERVIDOR,USUARIO,CLAVE);

    $sql = "CREATE DATABASE IF NOT EXISTS musica";
    $conexion->query($sql);

    $conexion->select_db('musica');

    $sql = "CREATE TABLE IF NOT EXISTS generos(
        idGenero tinyint PRIMARY KEY AUTO_INCREMENT,
        genero varchar(50) unique
    );
    
    CREATE TABLE IF NOT EXISTS lugares(
        idLugar tinyint PRIMARY KEY AUTO_INCREMENT,
        lugar varchar(50) unique
    );
    
    CREATE TABLE IF NOT EXISTS dispositivos(
        idDispositivos tinyint PRIMARY KEY AUTO_INCREMENT,
        dispositivo varchar(50)
    );

    CREATE TABLE IF NOT EXISTS usuarios(
        idUsuario tinyint PRIMARY KEY AUTO_INCREMENT,
        nombre varchar(50),
        clave varchar(50),
        dispositivoMasUsado varchar(50)
    );

    CREATE TABLE IF NOT EXISTS usuariosGeneros(
         idUsuario tinyint,
         genero varchar(50),
         CONSTRAINT fk_idUsuario FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario),
         CONSTRAINT pk_compuesta_UG PRIMARY KEY (idUsuario,genero) 
    );

    CREATE TABLE IF NOT EXISTS usuariosLugares(
        idUsuario tinyint,
         lugar varchar(50),
         CONSTRAINT fk_idUsuario_2 FOREIGN KEY (idUsuario) REFERENCES usuarios(idUsuario),
         CONSTRAINT pk_compuesta_UL PRIMARY KEY (idUsuario,lugar)
    );";

    //echo $sql;

    $conexion->multi_query($sql);

        while ($conexion->more_results() && $conexion->next_result());  //esta linea recorre el bucle hasta que limpia los rastros de la multiquery

    $dispositivos = [
    "Smartphone",
    "Computadora",
    "Tablet",
    "Smart TV",
    "Altavoz inteligente"
    ];

    $lugares = [
    "Casa",
    "Oficina",
    "Gimnasio",
    "Auto",
    "Parque"
    ];

    $generos = [
    "Rock",
    "Pop",
    "Jazz",
    "Reggaetón",
    "Clásica"
    ];

    foreach ($dispositivos as $key => $value) {
        $sql = "INSERT INTO dispositivos(dispositivo) VALUES ('".$value."')";
       // echo $sql.'<br>';
        $conexion->query($sql);
    }

     foreach($lugares as $key=> $value){
        $sql = "INSERT INTO lugares(lugar) VALUES ('".$value."')";
        $conexion->query($sql);
    }

    foreach ($generos as $key => $value) {
        $sql = "INSERT INTO generos(genero) VALUES ('".$value."')";
         $conexion->query($sql);
    }
 


?>
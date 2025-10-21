<?php
    require 'cargarFormulario.php';

    $cargar = new cargarFormulario();
//aqui recojo todos los datos de las tablas de la base de datos para cargar el formulario 
    $arrayDispositivos = $cargar->dispositivos();
    $arrayLugares = $cargar->lugares();
    $arrayGeneros = $cargar->generos();

?>
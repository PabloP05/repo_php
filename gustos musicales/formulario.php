<?php
    require 'cargarFormulario.php';

    $cargar = new cargarFormulario();
//aqui recojo todos los datos de las tablas de la base de datos para cargar el formulario 
    $arrayDispositivos = $cargar->dispositivos();
    $arrayLugares = $cargar->lugares();
    $arrayGeneros = $cargar->generos();

    /* print_r( $arrayGeneros); */

?>
<!-- FORMULARIO DE INCIO DE SESION DE CLIENTE  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMusic</title>
</head>
<body>
    <form action="enviar.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="clave" placeholder="Clave">

        <h4>Generos que te gustan</h4>
        <?php
            foreach ($arrayGeneros as $key => $value) {
                echo '<input type="checkbox" name="generos[]" value="'.$value.'">';
                echo '<label>'.$value.'</label><br>';
            } 
        ?>

        <h4>Lugares en los que sueles escuchar musica</h4>
        <?php
            foreach ($arrayLugares as $key => $value) {
                echo '<input type="checkbox" name="lugares[]" value="'.$value.'">';
                echo '<label>'.$value.'</label><br>';
            }
        ?> 

        <h4>Selecciona el dispositivo en el que sueles escuchar musica</h4>
        <select name="dispositivo" id="">
            <?php
                 foreach ($arrayDispositivos as $key => $value) {
                    echo '<option value="'.$value.'">'.$value.'</option>';
                } 
            ?>
        </select>
        <input type="submit" value="INICIAR">
    </form>
</body>
</html>
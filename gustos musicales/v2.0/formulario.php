<?php
    require 'cargarFormulario.php';

    $cargar = new cargarFormulario();
//aqui recojo todos los datos de las tablas de la base de datos para cargar el formulario 
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
        <input type="text" name="nombre" placeholder="Nombre"><br>
        <input type="pasword" name="clave" placeholder="clave"><br>
        <?php
            for($i=0;$i<$_POST['nDispositivos'];$i++){
                echo '<input type="text" name="dispositivos[]" placeholder="Dispositivo"><br>';
            }
        ?>

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
        <input type="submit" value="INICIAR">
    </form>
</body>
</html>
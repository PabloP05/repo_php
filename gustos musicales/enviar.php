<?php

    require 'configDB.php';

    $conexion = new mysqli(SERVIDOR,USUARIO,CLAVE,BBDD);

    if(!empty($_POST['nombre']) && !empty($_POST['clave'])){
        if(isset($_POST['lugares']) && isset($_POST['generos'])){
          $sql = "INSERT INTO usuarios(nombre,clave,dispositivoMasUsado) VALUES ('".$_POST['nombre']."','".$_POST['clave']."','".$_POST['dispositivo']."')";
           /* echo $sql; */
            $conexion->query($sql);
            if($conexion->affected_rows>0){
                $id = $conexion->insert_id;//saco la ultima id insertada

                foreach ($_POST['lugares'] as $key => $value) {
                    $sql ="INSERT INTO usuariosLugares(idUsuario,lugar) VALUES (".$id.",'".$value."')";
                    $conexion->query($sql);
                }

                foreach ($_POST['generos'] as $key => $value) {
                    $sql ="INSERT INTO usuariosGeneros(idUsuario,genero) VALUES (".$id.",'".$value."')";
                    $conexion->query($sql);
                }
            }
        }else{
            echo '<a href="formulario.php"><h1>Introduce generos y lugares</h1></a>';
        }
    }else{
       echo '<a href="formulario.php"><h1>Introduce usuario y contraseña</h1></a>';
    }

?>
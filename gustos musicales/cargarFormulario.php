<?php

    require 'configDB.php';

    class cargarFormulario{
        private $conexion;

        public function __construct(){
            $this->conexion= new mysqli(SERVIDOR,USUARIO,CLAVE,BBDD);
        }

        
        public function generos(){
            $sql = "SELECT * FROM generos";
            $resultado = $this->conexion->query($sql);
            $array = [];
            while($fila=$resultado->fetch_array()){
               array_push($array,$fila['genero']);
            }
            return $array;
        }


        public function dispositivos(){
            $sql = "SELECT * FROM dispositivos";
            $resultado = $this->conexion->query($sql);
             $array = [];
             while($fila=$resultado->fetch_array()){
               array_push($array,$fila['dispositivo']);
            }
            return $array;
        }

        public function lugares(){
            $sql = "SELECT * FROM lugares";
            $resultado = $this->conexion->query($sql);
             $array = [];
            while($fila=$resultado->fetch_array()){
               array_push($array,$fila['lugar']);
            }
            return $array;
        }


        private function cerrarConexion(){
            $this->conexion->close();
        }
    }

?>
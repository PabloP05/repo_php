<?php

    require 'configDB.php';

    class cargarFormulario{
        private $conexion;

        public function __construct(){
            $this->conexion= new mysqli(SERVIDOR,USUARIO,CLAVE,BBDD);
        }

        
        public function generos(){
            $sql = "SELECT * FROM generos";
            echo $sql;
            $resultado = $this->conexion->query($sql);
            $this->cerrarConexion();
            return $resultado;
        }


        public function dispositivos(){
            $sql = "SELECT * FROM dispositivos";
            $resultado = $this->conexion->query($sql);
            $this->cerrarConexion();
            return $resultado;
        }

        public function lugares(){
            $sql = "SELECT * FROM lugares";
            $resultado = $this->conexion->query($sql);
            $this->cerrarConexion();
            return $resultado;
        }


        private function cerrarConexion(){
            $this->conexion->close();
        }
    }

?>
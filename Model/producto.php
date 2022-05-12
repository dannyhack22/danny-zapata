<?php
    class Producto{
        private $idProducto;
        private $idCategoria;
        private $nombre;
        private $precio;
        private $estado;

        public function __construct(){}

        public function set_idProducto($idProducto){
            $this->idProducto= $idProducto;
        }

        public function set_idCategoria($idCategoria){
            $this->idCategoria= $idCategoria;
        }

        public function set_nombre($nombre){
            $this->nombre= $nombre;
        }

        public function set_precio($precio){
            $this->precio= $precio;
        }

        public function set_estado($estado){
            $this->estado= $estado;
        }


        public function get_idProducto(){
            return $this->idProducto;
        }

        public function get_idCategoria(){
            return $this->idCategoria;
        }

        public function get_nombre(){
            return $this->nombre;
        }

        public function get_precio(){
            return $this->precio;
        }

        public function get_estado(){
            return $this->estado;
        }

    }
?>
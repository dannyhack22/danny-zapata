<?php
    class Categorias {
        // definir atributos
        private $idCategoria;
        private $nombre;

        // definir constructor vacio ( depende de la necesidad)
         public function __construct(){

         }

        // constructor lleno (depende de la necesidad)

         /*public function __construct($idCategoria, $nombre){
             $this->idCategoria = $idCategoria;
             $this->nombre = $nombre;
         }*/


        // definir set
        public function set_idCategoria($idCategoria){
            $this->idCategoria = $idCategoria;
        }

        public function set_nombre($nombre){
            $this->nombre = $nombre;
        }

        //definir get
        public function get_idCategoria(){
            return $this->idCategoria;
        }

        public function get_nombre(){
            return $this->nombre;
        }

    }
?>
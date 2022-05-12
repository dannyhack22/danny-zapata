<?php 
    //coneccion para proyecto :PDO (libreria de php para coneccion y transacciones orientada a objetos)

    class Conection{
        private static $conexion = NULL;
        private $host = "127.0.0.1"; //servidor db (servidor por defecto de php, es como si fuera el "localhost")
        private $db = "tienda"; //db
        private $root = "root"; //usuario db
        private $password = ""; //contraseña

        //mysqli: conexion exclusiva a mysql soporta POO
        //mysqli: conexion exclusiva a mysql no soporta POO


        private function __construct(){

        }

        public static function conectar(){
            //capturar posibles errores en un array de la DB si hay errores los almacena en parametro ATTR y ERRMODE los retorna
            $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;

            // self (captura una var , es propio de PDO, es como el this )
            self::$conexion= new PDO('mysql:host=127.0.0.1;dbname=tienda','root','', $pdo_options);
            return self::$conexion;
        }

        // & si no recibe un parametro de conexion para desconectarlo toma por defecto $conexion (un atributo que definamos)
        static function desconectar(&$conexion){
            $conexion = NULL;
        }

    }

    $db = Conection::conectar();
    
?>
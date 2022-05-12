<?php

    require_once ('conection.php');

    // ----------------class----------------------------------

    class crudProducto {

        // --------------------listar-------------------------------
        public function listarProducto(){
            // establecer conexion con db
            $db= Conection::conectar();

            //definir sentencia sql (struct query languaje)
            $sql= $db->query('SELECT * FROM productos order by idProducto asc');

            //ejecutar consulta
            $sql->execute();
            Conection::desconectar($db);
            return ($sql->fetchAll());//retornar todos (fetch)
        }

        // -----------------------registrar----------------------------

        public function registrarProducto($producto){
            $mensaje= "";

            //establecer conexion a db
            $db= conection::conectar();

            //preparar sentencia sql (IA)
           $sql= $db->prepare('INSERT INTO
             productos (idProducto, idCategoria, nombre, precio, estado)
            --  : = parametros para asignar valores a values
             VALUES (:idProducto, :idCategoria, :nombre, :precio, :estado)');

            //asignar valores a parametros para :
           $sql->bindValue('idProducto', '');
           $sql->bindValue('idCategoria', $producto->get_idCategoria());
           $sql->bindValue('nombre', $producto->get_nombre());
           $sql->bindValue('precio', $producto->get_precio());
           $sql->bindValue('estado', $producto->get_estado());

           //verificacion
           try{
               $sql->execute(); //ejecutar sql
               $mensaje= "registro exitoso";
           }
           //mostrar errores del try
           //capturar exepciones de la transaccion sql (Exepcion)
           catch (Exepcion $e){
              $mensaje= $e->getMessage(); //obtener mensaje error
           }

           conection::desconectar($db);
           return $mensaje;
        }

        //--------------------5--------------------
        public function buscarProducto($producto){
            // establecer conexion con db
            $db= Conection::conectar();

            //definir sentencia sql (struct query languaje)
            $sql= $db->query("SELECT * FROM productos WHERE idProducto=".$producto->get_idProducto());

            //ejecutar consulta
            $sql->execute();
            Conection::desconectar($db);

            // var_dump($sql->fetch());
            return $sql->fetch();
            //fetch trae un solo registro y fetchAll varios registros
            // return ($sql->fetchAll());//retornar todos (fetch)
        }

        // --------------------14-------------------

        public function actualizarProducto($producto){
            $mensaje= "";

            //establecer conexion a db
            $db= conection::conectar();

            //preparar sentencia sql
           $sql= $db->prepare('UPDATE
           --  : = parametros para asignar valores a values
             productos SET
             idCategoria=:idCategoria,
             nombre=:nombre,
             precio=:precio,
             estado=:estado WHERE idProducto= :idProducto');

            //asignar valores a parametros para : (de un value)
           $sql->bindValue('idProducto', $producto->get_idProducto());
           $sql->bindValue('idCategoria', $producto->get_idCategoria());
           $sql->bindValue('nombre', $producto->get_nombre());
           $sql->bindValue('precio', $producto->get_precio());
           $sql->bindValue('estado', $producto->get_estado());

           //verificacion
           try{
               $sql->execute(); //ejecutar sql
               $mensaje= "actualizacion exitosa";
           }
           //mostrar errores del try
           //capturar exepciones de la transaccion sql (Exepcion)
           catch (Exepcion $e){
              $mensaje= $e->getMessage(); //obtener mensaje error
           }

           conection::desconectar($db);
           return $mensaje;
        }

    
        //-------------15-----------------------
        public function eliminarProducto($producto){
            $mensaje= "";

            //establecer conexion a db
            $db= conection::conectar();

            //preparar sentencia sql
           $sql= $db->prepare('DELETE FROM
           --  : = parametros para asignar valores a values
             productos WHERE idProducto= :idProducto');

            //asignar valores a parametros para : (de un value)
           $sql->bindValue('idProducto', $producto->get_idProducto());

           //verificacion
           try{
               $sql->execute(); //ejecutar sql
               $mensaje= "eliminacion exitosa";
           }
           //mostrar errores del try
           //capturar exepciones de la transaccion sql (Exepcion)
           catch (Exepcion $e){
              $mensaje= $e->getMessage(); //obtener mensaje error
           }

           conection::desconectar($db);
           return $mensaje;
        }

    }

    //$prueba = new crudCategorias();
    // var_dump($prueba->listarCategorias());

?>
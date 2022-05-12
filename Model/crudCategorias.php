<?php

    require_once ('conection.php');

    // ----------------class----------------------------------

    class crudCategorias {

        // --------------------listar-------------------------------
        public function listarCategorias(){
            // establecer conexion con db
            $db= Conection::conectar();

            //definir sentencia sql (struct query languaje)
            $sql= $db->query('SELECT * FROM categorias order by idCategoria asc');

            //ejecutar consulta
            $sql->execute();
            Conection::desconectar($db);
            return ($sql->fetchAll());//retornar todos (fetch)
        }

        // -----------------------registrar----------------------------

        public function registrarCategoria($categoria){
            $mensaje= "";

            //establecer conexion a db
            $db= conection::conectar();

            //preparar sentencia sql
           $sql= $db->prepare('INSERT INTO
             categorias(idCategoria, nombre)
            --  : = parametros para asignar valores a values
             VALUES (:idCategoria, :nombre)');

            //asignar valores a parametros para :
           $sql->bindValue('idCategoria', '');
           $sql->bindValue('nombre', $categoria->get_nombre());

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
        public function buscarCategoria($categoria){
            // establecer conexion con db
            $db= Conection::conectar();

            //definir sentencia sql (struct query languaje)
            $sql= $db->query("SELECT * FROM categorias WHERE idCategoria=".$categoria->get_idCategoria());

            //ejecutar consulta
            $sql->execute();
            Conection::desconectar($db);

            // var_dump($sql->fetch());
            return $sql->fetch();
            //fetch trae un solo registro y fetchAll varios registros
            // return ($sql->fetchAll());//retornar todos (fetch)
        }

        // --------------------14-------------------

        public function actualizarCategoria($categoria){
            $mensaje= "";

            //establecer conexion a db
            $db= conection::conectar();

            //preparar sentencia sql
           $sql= $db->prepare('UPDATE
           --  : = parametros para asignar valores a values
             categorias SET nombre=:nombre WHERE idCategoria= :idCategoria');

            //asignar valores a parametros para : (de un value)
           $sql->bindValue('idCategoria', $categoria->get_idCategoria());
           $sql->bindValue('nombre', $categoria->get_nombre());

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
        public function eliminarCategoria($categoria){
            $mensaje= "";

            //establecer conexion a db
            $db= conection::conectar();

            //preparar sentencia sql
           $sql= $db->prepare('DELETE FROM
           --  : = parametros para asignar valores a values
             categorias WHERE idCategoria= :idCategoria');

            //asignar valores a parametros para : (de un value)
           $sql->bindValue('idCategoria', $categoria->get_idCategoria());

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
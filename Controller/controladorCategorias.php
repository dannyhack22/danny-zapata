<?php
// -------------------------importar files----------------------------------
    require_once('../Model\categorias.php');
    require_once('../Model\crudCategorias.php');

    // -----------------------class--------------------------

    class ControladorCategoria{
        // ----------------------cinstructor----------------------
        public function __construct(){

        }

        // ----------------------------listar----------------------------

        public function listarCategorias(){
            //crear objeto en clase categoria
            $crudCategoria= new CrudCategorias();
            return $crudCategoria->listarCategorias();
        }

        // -------------------------------registrar------------------------

        public function registrarCategoria($nombre){
            //crear objeto en clase categoria
            $crudCategoria= new crudCategorias();
            $categoria = new Categorias();
            $categoria->set_idCategoria('');
            $categoria->set_nombre($nombre);  
            $mensaje= $crudCategoria->registrarCategoria($categoria);
            echo $mensaje;
        }

        //---------------4-------------------
        public function buscarCategoria($idCategoria){
            //crear objeto en clase categoria
            $crudCategoria= new crudCategorias();
            $categoria = new Categorias();
            $categoria->set_idCategoria($idCategoria);

            //buscar datos categoria en DB
            $datosCcategoria= $crudCategoria->buscarCategoria($categoria);
            //prueba
            // echo  $categoria['nombre'];
            $categoria->set_nombre($datosCcategoria['nombre']);

            //prueba
            // var_dump($categoria);

            //------------------10-----------------
            return  $categoria;
        }

        //-----------------13-------------------
        public function actualizarCategoria($idCategoria, $nombre){
            //crear objeto en clase categoria
            $crudCategoria= new crudCategorias();
            $categoria = new Categorias();
            $categoria->set_idCategoria($idCategoria);
            $categoria->set_nombre($nombre);

            //prueba
            // var_dump($categoria);
            $mensaje= $crudCategoria->actualizarCategoria($categoria);
            echo $mensaje;
        }

        //-----------------13-------------------
        public function eliminarCategoria($idCategoria){
            //crear objeto en clase categoria
            $crudCategoria= new crudCategorias();
            $categoria = new Categorias();
            $categoria->set_idCategoria($idCategoria);
            $categoria->set_nombre('');

            //prueba
            // var_dump($categoria);
            $mensaje= $crudCategoria->eliminarCategoria($categoria);
            // echo $mensaje;
            //scrip que muestra eventos js
            echo "<script>
                alert('$mensaje');
                document.location.href='../view/listarCategorias.php';
;            </script>";
        }
        


        // -------------------8----------------------
            
        public function desplegarVista($pagina){
            header("location:../view/".$pagina);
        }

    }

    // ---------------------------verificar ingreso de datos (registrar)--------------------------------

    // -------------3--------------
    //definir global para usar con cada metodo controlador
    $controladorCategoria= new ControladorCategoria();

    //saber si la var existe
    if (isset($_POST['registrar'])){
       //recibir var de form
       $nombre= $_POST['nombre'];
       $controladorCategoria->registrarCategoria($nombre);
    }
    // ----------------------------2-------------------------
    //request = post y get , uso personal
    else if (isset($_REQUEST['editar'])) {
        //base64 encode = funcion php para encriptar id var (ej: id= 1,  MQ==) x2 para mas seguridad
        $idCategoria= base64_encode($_REQUEST['idCategoria']);
        $idCategoria= base64_encode($idCategoria);

        // echo $idCategoria;
        // -----------------7---------------------
        $controladorCategoria->desplegarVista('editarCategoria.php?idCategoria='.$idCategoria);
    }
    //---------------------12-------------------------
    else if (isset($_POST['actualizar'])){
        //recibir var de form
        $nombre= $_POST['nombre'];
        $idCategoria= $_POST['idCategoria'];
        $controladorCategoria->actualizarCategoria($idCategoria, $nombre);
     }
     //--------------------16--------------------
     else if (isset($_GET['eliminar'])) {
        $idCategoria= $_REQUEST['idCategoria'];
        //confirm = alert de confirmacion
        // echo "<script>
        //     if (confirm('Esta seguro de realizar la eliminacion')){";
        //         $controladorCategoria->eliminarCategoria($idCategoria);
        // echo "}
        // </script>";
        // $controladorCategoria->desplegarVista('listarCategorias.php');
        $controladorCategoria->eliminarCategoria($idCategoria);
     }
     elseif (isset($_REQUEST['view'])) {
        $controladorCategoria->desplegarVista($_REQUEST['view']);   
     }
?>
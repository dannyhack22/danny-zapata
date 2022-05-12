<?php
// -------------------------importar files----------------------------------
    require_once('../Model\producto.php');
    require_once('../Model\crudProducto.php');

    // -----------------------class--------------------------

    class ControladorProducto{
        // ----------------------cinstructor----------------------
        public function __construct(){

        }

        // ----------------------------listar----------------------------

        public function listarProducto(){
            //crear objeto en clase categoria
            $crudProducto= new CrudProducto();
            return $crudProducto->listarProducto();
        }

        // -------------------------------registrar------------------------

        public function registrarProducto($idCategoria, $nombre, $precio, $estado){
            //crear objeto en clase categoria
            $crudProducto= new CrudProducto();
            $producto = new Producto();
            $producto->set_idProducto('');
            $producto->set_idCategoria($idCategoria);
            $producto->set_nombre($nombre);  
            $producto->set_precio($precio);  
            $producto->set_estado($estado);  
  
            $mensaje= $crudProducto->registrarProducto($producto);
            echo $mensaje;
        }

        //---------------4-------------------
        public function buscarProducto($idProducto){
            //crear objeto en clase categoria
            $crudProducto= new crudProducto();
            $producto = new Producto();
            $producto->set_idProducto($idProducto);

            //buscar datos categoria en DB
            $datosProducto= $crudProducto->buscarProducto($producto);
            //prueba
            // echo  $categoria['nombre'];
            $producto->set_idCategoria($datosProducto['idCategoria']);
            $producto->set_nombre($datosProducto['nombre']);
            $producto->set_precio($datosProducto['precio']);
            $producto->set_estado($datosProducto['estado']);

            //prueba
            // var_dump($categoria);

            //------------------10-----------------
            return  $producto;
        }

        //-----------------13------------------- falta?????????????????????'
        public function actualizarProducto($idCategoria, $nombre){
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
    $controladorProducto= new ControladorProducto();

    //saber si la var existe
    if (isset($_POST['registrar'])){
       //recibir var de form
       $nombre= $_POST['nombre'];
       $idCategoria= $_POST['idCategoria'];
       $precio= $_POST['precio'];
       $estado= $_POST['estado'];

       $controladorProducto->registrarProducto($idCategoria, $nombre, $precio, $estado);
    }
    // ----------------------------2-------------------------
    //request = post y get , uso personal
    else if (isset($_REQUEST['editar'])) {
        //base64 encode = funcion php para encriptar id var (ej: id= 1,  MQ==) x2 para mas seguridad
        $idProducto= base64_encode($_REQUEST['idProducto']);
        $idProducto= base64_encode($idProducto);

        // echo $idCategoria;
        // -----------------7---------------------
        $controladorProducto->desplegarVista('editarProducto.php?idProducto='.$idProducto);
    }
    //---------------------12------------------------- falta???????????????????????
    else if (isset($_POST['actualizar'])){
        //recibir var de form
        $nombre= $_POST['nombre'];
        $idCategoria= $_POST['idCategoria'];
        $controladorProducto->actualizarCategoria($idCategoria, $nombre);
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
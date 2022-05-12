<?php
//---------------9--------------------
//prueba
    // var_dump($categoria);

    // ---------------------11---------------------

    require_once('../Controller\controladorProducto.php');
    require_once('../Controller\controladorCategorias.php');

    //acceder a id para ejecutar metodo buscar categoria
    $idProducto= $_REQUEST['idProducto'];

    //base_decode = desencriptar variables , no se ve nada, es para desemcriptar valores para db
    $idProducto= base64_decode($_REQUEST['idProducto']);
    //desencriptar segunda vez
    $idProducto= base64_decode($idProducto);

     //llamar metodo buscar categoria del controlador

    $producto=  $controladorProducto->buscarProducto($idProducto);
// ----------------------------------------------------------
    $controladorCategoria= new ControladorCategoria();
    $listarCategoria= $controladorCategoria->listarCategorias();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar producto</title>
</head>
<body>
    <h1 align="center" style="color:darkorange">Editar Producto</h1>
    <input type="text" name="idProducto" id="idProducto" placeholder="Id"
    readonly value="<?php echo $producto->get_idProducto();?>">
    <br>
    <br>
    <input type="text" name="idProducto" id="idProducto" placeholder="Nombre"
    readonly value="<?php echo $producto->get_nombre();?>">
    <br>
    <br> 
    <select name="idCategoria" id="idCategoria">
        <option value="">_Seleccione la categoria_</option>
        <?php
                foreach ($listarCategoria as $categoria) {
        ?>
            <option value="<?php echo $categoria['idCategoria']?>"
            <?php if($categoria['idCategoria'] == $producto->get_idCategoria()){?> selected <?php } ?> >
                    <?php echo $categoria['nombre']?>
            </option>
        <?php
            }
        ?>

    </select>
    <br>
    <br>
    <input type="text" name="precio" id="precio" placeholder="$Precio"
    value="<?php echo $producto->get_precio();?>">
    <br>
    <br>
    <input type="radio" name="estado" id="estado" placeholder="Estado"
    <?php
        if($producto->get_estado()==1){
            ?>php checked <?php
        }
    ?>
    >Disponible
    <input type="radio" name="estado" id="estado2" placeholder="Estado"
    <?php
        if($producto->get_estado()==0){
            ?>php checked <?php
        }
    ?>
    >No disponible
    <br>
    <br>
    <button type="submit" name="editar" id="editar">Editar</button>
</html>
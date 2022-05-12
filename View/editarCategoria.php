<?php
//---------------9--------------------
//prueba
    // var_dump($categoria);

    // ---------------------11---------------------

    require_once('../Controller\controladorCategorias.php');
    //acceder a id para ejecutar metodo buscar categoria
    $idCategoria= $_REQUEST['idCategoria'];

    //base_decode = desencriptar variables , no se ve nada, es para desemcriptar valores para db
    $idCategoria= base64_decode($_REQUEST['idCategoria']);
    //desencriptar segunda vez
    $idCategoria= base64_decode($idCategoria);

     //llamar metodo buscar categoria del controlador

    $categoria=  $controladorCategoria->buscarCategoria($idCategoria);

?>

<!DOCTYPE html>
<!-- -------------------------6----------------------- -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="../Controller\controladorCategorias.php" method="POST">

        <h1 align='center'><strong>Editar Categoria</strong></h1>
        <input type="text" name="idCategoria" id="idCategoria" placeholder="id Categoria" readonly 
        value="<?php echo $categoria-> get_idCategoria()?>">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required 
        value="<?php echo $categoria-> get_nombre()?>">
        <button type="submit" name="actualizar">Actualizar</button>
    </form>
</body>
</html>
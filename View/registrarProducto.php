<?php
    require_once('../Controller\controladorCategorias.php');

    $controladorCategoria= new ControladorCategoria();
    $listarCategoria= $controladorCategoria->listarCategorias();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registrar producto</title>
</head>
<body>
    <h1 align="center" style="color:darkorange">Registrar Producto</h1>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
    <br>
    <br> 
    <select name="idCategoria" id="idCategoria">
        <option value="">_Seleccione la categoria_</option>
        <?php
                foreach ($listarCategoria as $categoria) {
        ?>
            <option value="<?php echo $categoria['idCategoria']?>">
                    <?php echo $categoria['nombre']?>
            </option>
        <?php
            }
        ?>

    </select>
    <br>
    <br>
    <input type="text" name="precio" id="precio" placeholder="$Precio">
    <br>
    <br>
    <input type="radio" name="estado" id="estado" placeholder="Estado">Disponible
    <input type="radio" name="estado" id="estado2" placeholder="Estado">No disponible
    <br>
    <br>
    <button type="submit" name="registrar" id="registrar">Registrar</button>
</html>
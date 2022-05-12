<?php
    require_once('../Controller\controladorProducto.php');

    $controladorProducto= new ControladorProducto();
    $listarProducto= $controladorProducto->listarProducto();
    
    // var_dump($listarCategoria);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Assets/css/jquery.dataTables.min.css">
    <title>listar Producto</title>
</head>
<body>
    <table id="example" class="display" style="width:100%">
       <thead>
           <tr>
               <th bgcolor="blue">IdProducto</th>
               <th bgcolor="blue">IdCategoria</th>
               <th bgcolor="yellow">Nombre</th>
               <th bgcolor="yellow">Precio</th>
               <th bgcolor="yellow">Estado</th>
               <th bgcolor="yellow">Acciones</th>
           </tr>
       </thead>
       <tbody>
           <!-- ?vista = var definida para acceder a una vista -->
           <a href="../Controller/controladorProducto.php?view=registrarProducto.php">Registrar</a>
           <?php
              foreach ($listarProducto as $producto) {
                  echo "<tr align='center'>";
                  echo "<td>".$producto['idProducto']."</td>";
                  echo "<td>".$producto['idCategoria']."</td>";
                  echo "<td>".$producto['nombre']."</td>";
                  echo "<td>".$producto['precio']."</td>";
                  echo "<td>".$producto['estado']."</td>";

                  echo "<td>
                  <form method='POST' action='../Controller\controladorProducto.php'>
                  <input type='hidden' name='idProducto' value=".$producto['idProducto']." />
                  <button type='submit' name='editar'>Editar</button>
                  </form>";
                  // invocar funcion js
                  echo "<a href='#' onclick='validarEliminacion($producto[idProducto])'>Eliminar</a>";
                  echo "</td>";
                  //---------------------------1-------------------------- 
                     //&concatenar variables , para ademas de varibales signos de concatenar segun el lenguaje
                //   echo "<td><a href='..\Controller\controladorCategorias.php?idCategoria=".$categoria['idCategoria']."&editar'>Editar</a></td>";

                //   echo "<td><a href='..\Controller\controladorCategorias.php?idCategoria=".$categoria['idCategoria']."&eliminar'>Eliminar</a></td>";
                  echo "</tr>";
              }
           ?>
       </tbody>
       <!-- //libreria -->
       <!-- <tfoot>
            <tr>
               <th bgcolor="blue">Id</th>
               <th bgcolor="yellow">Nombre</th>
               <th bgcolor="yellow">Acciones</th>
            </tr>
        </tfoot> -->
    </table>
    <script>
        function validarEliminacion(idProducto) {
            let eliminar= "";
            if (confirm('¿Esta seguro de eliminar el producto?'));
            document.location.href= "../Controller/controladorProducto.php?idProducto="+idProducto+'&eliminar';
        }
    </script>

    <!-- //librerias -->
    <script src="../Assets/js/jquery-3.5.1.js"></script>
    <script src="../Assets/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
        } );
    </script>
</body>
</html>

        <!-- jquery para paginacion -->
<!-- https://datatables.net/ -->
<!-- https://datatables.net/examples/basic_init/zero_configuration.html , para enlaces js y css, html, y copiar class, id, style en una table-->
<!-- cambiar lenguaje--------------------------------------------------------- -->
<!-- https://es.stackoverflow.com/questions/87338/cambiar-idioma-de-datatables -->
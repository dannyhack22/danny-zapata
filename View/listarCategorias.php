<?php
    require_once('../Controller\controladorCategorias.php');

    $controladorCategoria= new ControladorCategoria();
    $listarCategoria= $controladorCategoria->listarCategorias();
    
    // var_dump($listarCategoria);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Assets/css/jquery.dataTables.min.css">
    <title>Document</title>
</head>
<body>
    <table id="example" class="display" style="width:100%">
       <thead>
           <tr>
               <th bgcolor="blue">Id</th>
               <th bgcolor="yellow">Nombre</th>
               <th bgcolor="yellow">Acciones</th>
           </tr>
       </thead>
       <tbody>
           <!-- ?vista = var definida para acceder a una vista -->
           <a href="../Controller/controladorCategorias.php?view=registrarCategoria.php">Registrar</a>
           <?php
              foreach ($listarCategoria as $categoria) {
                  echo "<tr>";
                  echo "<td>".$categoria['idCategoria']."</td>";
                  echo "<td>".$categoria['nombre']."</td>";
                  echo "<td>
                  <form method='POST' action='../Controller\controladorCategorias.php'>
                  <input type='hidden' name='idCategoria' value=".$categoria['idCategoria']." />
                  <button type='submit' name='editar'>Editar</button>
                  </form>";
                  // invocar funcion js
                  echo "<a href='#' onclick='validarEliminacion($categoria[idCategoria])'>Eliminar</a>";
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
        function validarEliminacion(idCategoria) {
            let eliminar= "";
            if (confirm('¿Esta seguro de eliminar la categoria?'));
            document.location.href= "../Controller/controladorCategorias.php?idCategoria="+idCategoria+'&eliminar';
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
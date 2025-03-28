<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

  <div class="container mt-5">
    <div class="card mt-1 table-hover">
      <div class="card-header">
        <div class="row">
          <div class="col"><strong>  Lista de productos</strong></div>
          <div class="col text-end"><a href="registrar.php" class="btn btn-sm btn-outline-warning">Registrar</a></div>
        </div>


      </div>
      <div class="card-body">
        <table class="table table-striped table-sm table-bordered" id="tabla-productos">
          <thead>
            <tr>
              <th>ID</th>
              <th>Marca</th>
              <th>Tipo</th>
              <th>Descripción</th>
              <th>Precio</th>
              <th>Garantía</th>
              <th>Nuevo</th>
            </tr>
          </thead>
          <tbody>
            <!-- Contenido dinamico -->
          </tbody>
        </table>
      </div> <!-- ./card-body -->
    </div> <!-- ./Card -->
  </div> <!-- ./Container -->






  <script>

    function obtenerDatos() {
      fetch(`../../app/controllers/ProductoController.php`, {
        method: 'GET'
      })
        .then(response => { return response.json() })
        .then(data => {
          const tabla = document.querySelector("#tabla-productos tbody");
          data.forEach(element => {
            tabla.innerHTML += `
              <tr>
                <td> ${element.id} </td>
                <td> ${element.marca} </td>
                <td> ${element.tipo} </td>
                <td> ${element.descripcion} </td>
                <td> ${element.precio} </td>
                <td> ${element.garantia} </td>
                <td> ${element.esnuevo} </td>
              </tr>
            
            `;
          });
        })
        .catch(error => {
          console.error(error);
        });
    }

    document.addEventListener("DOMContentLoaded", obtenerDatos);



  </script>



</body>

</html>
<?php if (isset($_SESSION['username'])) : ?>

  <?php
  $title = "Deudores";
  $navar = "views";
  include("../layouts/header.php")
  ?>



  <section class="container-fluid">


    <!------------------- FORMULARIO  ----------------------->

    <div class="container-fluid text-center">
      <div class="row justify-content-md-center">

        <div class="col col-lg-4 p-4">

          <div class="card">

            <div class="card-body">
              <h2>Agregar usuario</h2>
              <p>Dudores.</p>
              <?php
              include '../controllers/deudores.php';
              $model = new Deudores();
              $return = $model->deudoresFunction();

              ?>

              <form action="" method="post">

                <div class="input-group mb-3">
                  <label class="input-group-text" for="nombre">Nombre: </label>
                  <input type="nombre" id="nombre" name="nombre" class="form-control" placeholder="Ingrese su nombre" required>
                </div>

                <div class="input-group mb-3">
                  <label class="input-group-text" for="numero">Telefono </label>
                  <input type="number" id="numero" name="tel" class="form-control" placeholder="Telefono" required>
                </div>
                <div class="input-group mb-3">
                  <label class="input-group-text" for="direcion">Dirección </label>
                  <input type="text" id="direcion" name="direcion" class="form-control" placeholder="Dirección" required>
                </div>



                <div class="mb-3">
                  <label for="nota" class="form-label">Articulo NOTA:</label>
                  <textarea class="form-control" name="nota" id="nota" rows="3" required></textarea>
                </div>


                <div class="input-group mb-3">
                  <label class="input-group-text" for="precio">Precio: </label>
                  <input type="number" name="precio" id="precio" class="form-control" placeholder="Precio $" required>
                </div>

                <div class="input-group mb-3">
                  <label class="input-group-text" for="date">Fecha: </label>
                  <input type="date" name="fecha" id="date" class="form-control" placeholder="Ingrese su correo" aria-label="Username" aria-describedby="basic-addon1">
                </div>




                <button type="submit"   class="btn btn-dark">Agregar</button>


              </form>
            </div>
          </div>
        </div>
        <!------------------- Formulario  ----------------------->




        <div class="col-md-auto">
        </div>


        <!------------------- table  ----------------------->


        <div class="col col-lg-7">
          <h1> Contenido</h1>
          <table class="table table-striped table-hover" id="tabla_id">
            <div class="table-responsive">

              <thead>
                <tr>
                  <th scope="col">#ID</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Articulo</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Fecha</th>


                  <th class="btn-accion" scope="col">Acción</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $finlDeudors = $model->finAllDeudor();

                if (isset($finlDeudors)) {
                  foreach ($finlDeudors as $usuario) : ?>
                    <tr class="">

                      <td> <?php echo $usuario->id; ?> </td>
                      <td><?php echo $usuario->nombre; ?></td>
                      <td> <?php echo $usuario->tel; ?> </td>
                      <td> <?php echo $usuario->direcion; ?></td>
                      <td><?php echo $usuario->nota; ?> </td>
                      <td> <?php echo $usuario->precio; ?></td>
                      <td><?php echo $usuario->fecha; ?></td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">

                          <a name="" id="" class="btn btn-success" href="#" role="button">
                            <i class="bi bi-pencil-square"></i>
                          </a>
                       

                          <a class="btn btn-danger"
                          id="miBoton"
                           href="delete.php?id=<?php if (isset($usuario->id)) {
                                     echo $usuario->id;
                           }; ?>" role="button"> <i class="bi bi-trash3-fill"></i>
                           </a>
                      
                        </div>
                      </td>
                    </tr>
                <?php
                  endforeach;
                }
                ?>


              </tbody>
            </div>
          </table>

        </div>

        <!------------------- table  ----------------------->






      </div>
    </div>
  </section>

  <br>

                
  <?php
if (isset($_POST['submit'])) {
    // Process form submission
    echo '<script>
            Swal.fire({
                title: "Success",
                text: "Proceso exitoso!",
                icon: "success",
                confirmButtonText: "OK"
            });
          </script>';
}
?>


  <?php



  include("../layouts/footer.php")

  ?>

<?php
else :
  header('location: ../login.php');
?>

<?php endif; ?>
<?php if (isset($_SESSION['username'])) : ?>


<?php $usuario = $_SESSION['username']; ?>
<?php

$title = "Ventas";

$navar = "views";
include("../layouts/header.php")

?>

<section class="container">
    <section class="row  justify-content-md-center">
        <section class="col-3"></section>

        <section class="col-6">
        <div class="p-4" >
               
               <div class="card">
             
                   <div class="card-body">  
                    <?php
                      include '../controllers/devolucion.php';

                        $model = new Devolver();
                        $retur = $model->functionDevolver(); 
                    ?> 
                     <p>Devolver producto.</p>
                       <form action="" method="post">

                       
                        <div class="input-group mb-3">
                               <span class="input-group-text" id="basic-addon1">Nombre del cliente </span>
                               <input type="text"
                               name="name_client" 
                               class="form-control"
                                placeholder="Nombre"                            
                               required>
                             </div>
                             
                             <div class="input-group mb-3">
                               <span class="input-group-text" id="Telefono">Telefono </span>
                               <input type="text"
                               name="tel" 
                               class="form-control"
                                placeholder="Telefono"
                                 required>
                             </div>

                             <div class="mb-3">
                               <label for="direc" class="form-label">Dirección</label>
                               <input type="text"
                                 class="form-control" name="direc" id="direc" aria-describedby="helpId" placeholder="Su direción" required>                               
                             </div>

                             <div class="input-group mb-3">
                               <span class="input-group-text" id="basic-addon1">Precio de la venta: </span>
                               <input type="number"
                               name="precio" 
                               class="form-control"
                                placeholder="$"
                               required>
                             </div>

                             <div class="input-group mb-3">
                               <span class="input-group-text" id="basic-addon1">Dia de la devolución </span>
                               <input type="date"
                               name="fecha" 
                               class="form-control"
                               required>
                             </div>
                             <div class="input-group mb-3">
                               <input type="hidden"
                               value="<?php if(isset($usuario)){ echo $usuario; }  ?>" 
                                name="vendedor" id="" rows="3" readonly>
                             </div>
                             
                             
                        <div class="mb-3 p-2">
                          <label for="" class="form-label">Nombre del  articulo/s cantidades:</label>                          
                          <textarea class="form-control" name="nota" id="" rows="3"></textarea>
                        </div>               
                                            
                               <button type="submit" class="btn btn-dark">Agregar</button>
                       
       
                       </form>
                   </div>
               </div>     
        </section>
        <section class="col-3"></section>
    </section>
</section>

<?php
else :
    header('location: ../login.php');
?>

<?php endif; ?>
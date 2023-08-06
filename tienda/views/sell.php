<?php if (isset($_SESSION['username'])) : ?>
   
    <?php $id = $_SESSION['id_user'];  ?>

<?php

$title = "Vender";

$navar = "views";
include("../layouts/header.php")

?> <div class="container">
    <div class="row p-4">
        <section class="col-3"></section>
        <section class="col-6">
            <div class="card">
                <div class="card-body">

                    <?php

                    if (isset($_POST['id_producto'])) {
                        include '../controllers/add_product.php';
                        $model = new Products();
                        $id_product = $_POST['id_producto'];

                        $search = $model->search($id_product);
                    }
                    ?>

                    <?php

                    if (!isset($_POST['id_producto'])) : ?>

                        <form action="" method="post">
                            <div class="mb-3 col-lg6">
                                <label for="id_producto" class="form-label">Id</label>
                                <input type="number" class="form-control" name="id_producto" id="id_producto" placeholder="Id del producto">
                            </div>
                            <button type="submit" class="btn btn-success">Buscar</button>
                        </form>

                    <?php else :  ?>
                        
                  
                        <form method="post" action="load_datas_sell_product.php">
                            <p>formulario aqui: </p>

                            <div class="mb-3 col-lg6">
                                <label for="id_producto" class="form-label">Producto Id</label>
                                <input 
                                type="number"
                                 class="form-control"
                                  value="<?php if (isset($search['id_produc'])) {
                                    echo $search['id_produc'];
                                  } ?>" name="id_produc" readonly onmousedown="return false;">
                            </div>

                            <div class="mb-3">

                       
                                <div class="mb-3 col-lg-6">
                                    <label for="" class="form-label ">Cantidad disponible:</label>
                                    <select class="form-select form-select-lg6"
                                     name="cantidad" id="cantidadInput" required > 
                                     <option value="">Selecciona una opción</option>
                                            
                                        <?php for ($i = 1   ; $i <= $search['cantidad']; $i++) { ?>
                                            <option value="<?php echo $i; ?>"  >Selecionar <?php echo $i; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <input type="hidden" value="<?php echo $search['name_product'];  ?>" name="producto">


                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="talla" required>
                                    <?php if (isset($search['talla'])) { ?>
                                        <option value="<?php echo $search['talla']; ?>" >Talla: <?php echo $search['talla']; ?></option>
                                    <?php } ?>
                                </select>

                              
                                    <img src="../media/img/<?php echo $search['filename']; ?>" width="20%" alt="Img">
                                </p>
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre del cliente</label>
                                    <input type="text" class="form-control" name="cliente_name" id="" aria-describedby="helpId" placeholder="" required>
                                </div>

                                <input type="hidden" value="<?php echo $usuario ?>" name="name_vendedor">
                                
                                <input type="hidden" value="<?php echo $id ?>" name="id_user">

                           
                                <label for="">Valor a pagar: </label>
                                <input type="text" id="miInput" name="valor_pagar" placeholder="Ingresa tu nombre" readonly required>
                                <br><br>

                            

                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    
                                    <button type="submit" name="vender" class="btn btn-warning">Vender</button>

                                    <a href="sell.php" class="btn btn-danger">Cancelar</a>
                                </div>
                        </form>




                    <?php endif; ?>
                </div>
            </div>
        </section>
        <section class="col-3">
            <p>Displibles: <em><?php if (isset($search['cantidad'])) {
                                    echo $search['cantidad'];
                                } ?></em>
            </p>
            <p>Precio: <em><?php if (isset($search['precio'])) {
                                echo $search['precio'];
                            } ?></em>
            </p>
            <p>Vender.</p>
        </section>
    </div>
</div>
<script>
    //Obtenemos el input y la etiqeta p

    const cantidadInput = document.getElementById('cantidadInput');
    const valorCalculado = document.getElementById('miInput');


    // Escucha el evento de cambio en el input
    cantidadInput.addEventListener('change', function() {
        const cantidad = parseInt(cantidadInput.value); // Obtén la cantidad del input

        const precio = <?php echo $search['precio']; ?>; // Obtén el precio de PHP


        // Calcula el valor y actualiza el contenido de la etiqueta <p>
        const nuevoValorCalculado = cantidad * precio;
        valorCalculado.value = nuevoValorCalculado;

    });
// Obtén una referencia al input
const miInput = document.getElementById('miInput');




</script>



<?php include("../layouts/footer.php"); ?>

<?php
else :
    header('location: ../login.php');
?>

<?php endif; ?>
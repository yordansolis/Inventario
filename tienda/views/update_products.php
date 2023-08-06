<?php if (isset($_SESSION['username'])) : ?>


<?php $usuario = $_SESSION['username']; ?>


<?php
    $title = "Editar productos";
    $navar = "views";
    include("../layouts/header.php")
    ?>

    
<div class="container-fluid text-center">
            <div class="row justify-content-md-center">

                <div class="col col-lg-4 p-4">
                    

                    <p>Actulizar producto</p>

                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nombre: </span>
                                    <input type="text" name="name_producto" class="form-control" placeholder="Nombre del producto" required>
                                </div>

                                <select class="form-select form-select-lg mb-3" name="talla" aria-label="form-select-lg example" required>
                                    <option selected>Talla</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="4">31</option>
                                    <option value="4">32</option>
                                    <option value="4">33</option>
                                    <option value="4">34</option>
                                    <option value="4">35</option>
                                    <option value="4">36</option>
                                    <option value="4">37</option>
                                    <option value="5">38</option>
                                    <option value="6">39</option>
                                    <option value="4">40</option>
                                    <option value="4">41</option>
                                    <option value="4">42</option>
                                    <option value="4">43</option>
                                    <option value="4">44</option>
                                </select>



                                <div class="input-group mb-3 p-2">
                                    <span class="input-group-text" id="basic-addon1">Cantidad: </span>
                                    <input type="number" name="cantidad" class="form-control" placeholder="Ingrese la cantidad" required>
                                </div>

                                <div class="input-group mb-3 p-2">
                                    <span class="input-group-text" id="basic-addon1">Precio: </span>
                                    <input type="number" name="precio" class="form-control" placeholder="Ingrese su telefono" required>
                                </div>

                                <div class="mb-3">
                                    <input type="file" class="form-control" name="filename" accept="image/*" id="file" aria-describedby="helpId" placeholder="" required>

                                </div>

                                <input type="hidden" value="<?php echo $id ?>" name="id_user">
                                <p>Vender: <?php echo $usuario ?></p>


                                <button type="submit" name="submit" class="btn btn-success">Actualizar</button>


                            </form>
                        </div>
                    </div>




<?php include("../layouts/footer.php"); ?>




<?php
else :
    header('location: ../login.php');
?>

<?php endif; ?>                    
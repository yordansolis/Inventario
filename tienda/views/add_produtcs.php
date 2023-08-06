<?php if (isset($_SESSION['username'])) : ?>


    <?php $usuario = $_SESSION['username']; ?>
    <?php $id = $_SESSION['id_user'];  ?>



    <?php
    $title = "Agregar productos";
    $navar = "views";
    include("../layouts/header.php");

    ?>




    <section class="container-fluid">
        <h2 class="text-center p-3">
            <div class="badge bg-dark text-wrap" style="width: 18rem;">
                Agregar Producto
            </div>
        </h2>


        <!------------------- FORMULARIO  ----------------------->

        <div class="container-fluid text-center">
            <div class="row justify-content-md-center">

                <div class="col col-lg-4 p-4">

                    <?php
                    include '../controllers/add_product.php';
                    $model = new Insert();
                    $insert = $model->insert();
                    ?>

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


                                <button type="submit" name="submit" class="btn btn-dark">Agregar</button>


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
                                    <th scope="col">Talla</th>
                                    <th scope="col">Cantidad</th>

                                    <th class="btn-tel" scope="col">foto</th>
                                    <th class="btn-accion" scope="col">Acción</th>


                                </tr>
                            </thead>

                            <?php
                            //$model = new Products();
                            $rows = $model->fetch();
                            ?>
                            <?php if (!empty($rows)) : ?>
                                <?php $i = 1; ?>
                                <tbody>
                                    <?php foreach ($rows as $row) : ?>
                                        <tr class="">
                                            <td> <?php echo $row->id_produc; ?> </td>
                                            <td><?php echo $row->name_product; ?> </td>
                                            <td> <?php echo $row->talla; ?></td>
                                            <td><?php echo $row->cantidad; ?></td>
                                            <td>
                                                <img src="../media/img/<?php echo $row->filename; ?>" width="70px" alt="...">
                                            </td>

                                            <td>
                                                
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a class="btn btn-success"
                                                     href="update_products.php?id=<?php if (isset($row->id_produc)) {
                                                                                                 echo $row->id_produc;
                                                        }; ?>" role="button"><i class="bi bi-pencil-square"></i> </a>

                                                </div>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <p>No data</p>
                                <?php endif; ?>

    </section>

    <?php include("../layouts/footer.php"); ?>




<?php
else :
    header('location: ../login.php');
?>

<?php endif; ?>
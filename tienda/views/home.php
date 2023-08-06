<?php if (isset($_SESSION['username'])) : ?>


    <?php
    $title = "Inicio";
    $navar = "views";
    include("../layouts/header.php");

    include('../controllers/Products.php');
    ?>






    <section class="container">
        <section class="row justify-content">
            <div class="col-lg-3">
                <div class="p-3">
                    <label for=""> Buscar articulo</label>
                    <input type="search" class="form-control card-filter" name="" id="" aria-describedby="helpId" placeholder="Buscar...">
                </div>
            </div>

        </section>





        <section class="row">
            <?php
            $model = new Products();
            $rows = $model->fetch();
            ?>

            <?php if (!empty($rows)) : ?>
                <?php $i = 1; ?>
                <?php foreach ($rows as $row) : ?>
                    <div class="col-4 p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">

                                    <div class="card" style="width: 18rem;">
                                        <img src="../media/img/<?php echo $row->filename; ?>" class="card-img-top" alt="Img">
                                        <div class="card-body">
                                            <h5 class="card-title text-center"><?php echo $row->name_product; ?>. </h5>
                                            <p class="card-text">Talla: <?php echo $row->talla; ?> .</p>
                                  
                                                
                                                <?php
                                                if ($row->cantidad == 0) {
                                                    
                                                    echo "<p class='badge bg-danger text-wrap'> 
                                                    Agotado  " . $row->cantidad . " </p>";
                                                }else{
                                                    echo  
                                                    "<p class='badge bg-primary text-wrap'> Cantidad ". $row->cantidad. " </p>";
                                                }
                                               ?>

                                            <p class="card-text"><strong>Precio: <?php echo $row->precio; ?> </strong> .</p>
                                            <p class="card-text"> <?php echo $row->username; ?>.</p>
                                            <p class="card-text"> <strong> Id Product: <?php echo $row->id_produc; ?>. </strong></p>
                                        </div>
                                    </div>




                                </div>




                            </div>
                        </div>
                    </div>
                    <br><br>

                <?php endforeach; ?>



            <?php else : ?>
                <p>No data</p>
            <?php endif; ?>

        </section>















        <nav aria-label="Page navigation example">
            <ul class="pagination p-4">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </section>



    <?php

    include("../layouts/footer.php");
    ?>

<?php
else :
    header('location: ../login.php');
?>

<?php endif; ?>
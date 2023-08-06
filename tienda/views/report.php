<?php if (isset($_SESSION['username'])) : ?>

<?php
$title = "Reportes";
$navar = "views";
include("../layouts/header.php")
?> 
<section class="container">
    <section class="p-4">

    <?php
        include '../controllers/reportes.php';
        $datos = new Reportes();
        if(isset($datos)){
            
            $finAll =  $datos->finAllReporFuction();
    
            $fin =  $datos->finReportFuction();
            $deudores = $datos->finDeudoresFution();                
            $devoluciones = $datos->finDevolucionFution();
        }


    ?>
        
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <button class="btn btn-success" > Csv</button>
            <button class="btn btn-danger" > Pdf</button>
        </div>
        
        
        <h1>Reporte de ventas </h1>       
        
        <hr>

        <h2 style="color:blue"> reporte de ventas por dia </h2>
        <p> fecha: 27/07/2023 </p>


        


        
        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID venta</th>
                        <th scope="col">Id del producto</th>
                        <th scope="col">Cantidad del producto</th>
                        <th scope="col">Nombre del producto</th>
                        <th scope="col">Fecha de la venta</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Valor pagado</th>
                        <th scope="col">Vendedor</th>
                        <th>Ación</th>
                    </tr>
                </thead>
                <?php  
                if(!empty($finAll)){ 
                    foreach($finAll as $fins): 
                ?>        
                <tbody>
                    <tr class="">
                        <td ><?php  echo $fins->id_venta; ?></td>
                        <td ><?php  echo $fins->id_produc; ?></td>
                        <td ><?php  echo $fins->cantidad; ?></td>
                        <td><?php  echo $fins->name_product; ?></td>
                        <td><?php  echo $fins->fecha_venta; ?></td>
                        <td ><?php  echo $fins->name_client; ?></td>
                        <td><?php  echo $fins->pagar; ?></td>
                        <td><?php  echo $fins->username; ?></td>
                        <td>


    <a class="btn btn-danger"
   href="delete.php?id_venta=<?php echo $fins->id_venta; ?>&id_produc=<?php echo $fins->id_produc; ?>"
   role="button">
   <i class="bi bi-trash3-fill"></i>
</a>





                    </tr>   
                </tbody>
                
                <?php
                 endforeach; 
                    }
                  ?>
            
            </table>
        </div>


        <div class="table-responsive col-lg-6">
        <table class="table table-warning">
            <thead>
                <tr>
                    <th>Numero de ventas</th>
                    <th>Valor  en el dia</th>
                </tr>
            </thead>
            <?php 
            if(!empty($fin)){  
            foreach($fin as $fi): ?> 
            <tbody>
                <td><?php  echo $fi->total_ventas; ?></td>
                <td><?php  echo $fi->valor_total; ?></td>
            </tbody>
            <?php endforeach;  ?>

            </table>
            </div>

            <h3> Produtos inventario en tienda</h3>
            <div class="table-responsive  col-lg-8">
       
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID Productos</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Talla</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Ación</th>

                    </tr>
                </thead>
                <tbody>
                <?php                  
                
                    $finsAll = $datos->fetch();
           
                    if($finsAll){
                        foreach($finsAll as $data):
                         ?>
                    <tr class="">
                        <td ><?php echo $data->id_produc; ?></td>
                        <td><?php echo $data->name_product; ?></td>
                        <td><?php echo $data->talla; ?></td>
                        <td><?php echo $data->cantidad; ?></td>
                        <td><?php echo $data->precio; ?></td>
                        <td>
                            <img src="../media/img/<?php echo $data->filename; ?>" width="70px" alt="..."> </td>
                        <td><?php echo $data->username; ?></td>
                        <td>
                        <a class="btn btn-danger"
                          id="miBoton"
                           href="delete.php?id_produc=<?php if (isset($data->id_produc)) {
                                     echo $data->id_produc;
                           }; ?>" role="button"> <i class="bi bi-trash3-fill"></i>
                           </a>

                        </td>


                    </tr>

                </tbody>
                <?php
                    endforeach;
                         }
                ?>
            </table>
        </div>





            <h3>Deudores</h3>

        <div class="table-responsive col-lg-8">
        <table class="table table-light">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente </th>
                    <th>Telefono</th>
                    <th>Direción</th>
                    <th>Nota</th>
                    <th>Precio</th>
                    <th>Fecha</th> 
                    <th>
                        
                    </th>                   
                </tr>
            </thead>
            
            <?php 
            if(!empty($deudores)) { 
             foreach($deudores as $deudor): ?> 
            <tbody>
                <td><?php  echo $deudor->id; ?></td>
                <td><?php  echo $deudor->nombre; ?></td>
                <td><?php  echo $deudor->tel; ?></td>
                <td><?php  echo $deudor->direcion; ?></td>
                <td><?php  echo $deudor->nota; ?></td>
                <td><?php  echo $deudor->precio; ?></td>
                <td><?php  echo $deudor->fecha; ?></td>
                <td>
                <a class="btn btn-danger"
                          id="miBoton"
                           href="delete.php?id_deudor=<?php if (isset($deudor->id)) {
                                     echo $deudor->id;
                           }; ?>" role="button"> <i class="bi bi-trash3-fill"></i>
                           </a>
                </td>
            </tbody>
            <?php endforeach;  }?>

            </table>
            </div>

                <h4>Devoluciones</h4>

                <div class="table-responsive col-lg-10">
        <table class="table table-light">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente </th>
                    <th>Telefono</th>
                    <th>Direción</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                    <th>Vendor</th> 
                    <th>Nota</th> 

                    <th>Ación</th>                   
                </tr>
            </thead>
            <?php  
            
            if(!empty($devoluciones)) { 
   
                foreach($devoluciones as $devolver): ?> 
            <tbody>
                <td><?php  echo $devolver->id; ?></td>
                <td><?php  echo $devolver->name_client; ?></td>
                <td><?php  echo $devolver->tel; ?></td>
                <td><?php  echo $devolver->direc; ?></td>
                <td><?php  echo $devolver->precio; ?></td>
                <td><?php  echo $devolver->fecha; ?></td>
                <td><?php  echo $devolver->vendedor; ?></td>
                <td><?php  echo $devolver->nota; ?></td>
                <td>
                <a class="btn btn-danger"
                          id="miBoton"
                           href="delete.php?id_devolver=<?php if (isset($devolver->id)) {
                                     echo $devolver->id;
                           }; ?>" role="button"> <i class="bi bi-trash3-fill"></i>
                           </a>
                </td>
            </tbody>
            <?php endforeach;  } } ?>

            </table>
            </div>

            <hr>


    </section>
</section>





<?php
else :
    header('location: ../login.php');
?>

<?php endif; ?>
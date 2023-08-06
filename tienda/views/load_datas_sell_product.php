<?php
       include '../controllers/sell_product.php';
       $model = new SellProduct();
       $sell = $model->sell();
      
?>
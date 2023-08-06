<?php

require_once 'Products.php';

class SellProduct extends Products{

    public function  sell(){
      
        if (isset($_POST)) {
            if(isset($_POST['id_produc']) && isset($_POST['cantidad']) && isset($_POST['producto']) && isset($_POST['talla']) && isset($_POST['cliente_name']) && isset($_POST['name_vendedor']) && isset($_POST['valor_pagar'])  ){               
             
                
                
                $id_product = $_POST['id_produc'];
                $id_user = $_POST['id_user'];
                $cantidad_comprar = $_POST['cantidad'];         
                $name_cliente = $_POST['cliente_name'];    
                $valor_pagar = $_POST['valor_pagar'];
                $reporte_venta = null;
 
               

                $queryProduct = 'SELECT * FROM add_products where id_produc =:id';
                $sentencia = $this->DBH->prepare($queryProduct);
                $sentencia->bindParam(':id', $id_product, PDO::PARAM_INT);
                $sentencia->execute();

                $product = $sentencia->fetch(PDO::FETCH_ASSOC);

                
       
                if($cantidad_comprar > $product['cantidad'] ){
                    die("Error fatal no puede comprar mas de la cantidad disponible");
                }else if($cantidad_comprar < 0){
                    die("usted no puede comprar 0 cantidades"); 
                }else if($product['cantidad'] == 0 ){
                    die("Producto agotado");
                }

                #vender   Update a la db cantidad
                $cancular_nuevo_valor  = $product['cantidad'] - $cantidad_comprar;
                

                #actializando la cantidad del producto --
                $query_sel_product = 'UPDATE add_products SET cantidad=:cancular_nuevo_valor 
                where id_produc =:id_product';
                $sent = $this->DBH->prepare($query_sel_product);              
                $sent->bindParam(':cancular_nuevo_valor', $cancular_nuevo_valor, PDO::PARAM_INT);
                $sent->bindParam(':id_product', $id_product, PDO::PARAM_INT);

                $sent->execute();

                
                #Insertando la compra a reportes 
                $queryRepor = "INSERT INTO vender(name_client, pagar, id_user, id_produc)VALUES (:name_cliente, :valor_pagar, :id_user, :id_product)"; 

                $insertReport = $this->DBH->prepare($queryRepor);

                $insertReport->bindParam(':name_cliente', $name_cliente);
                $insertReport->bindParam(':valor_pagar', $valor_pagar);   
                $insertReport->bindParam(':id_user', $id_user);
                $insertReport->bindParam(':id_product', $id_product);              
                
                $insertReport->execute();

                if($insertReport){
                    echo "<script>alert('Ventido successfully');</script>";
                    echo "<script>window.location.href = '../views/sell.php';</script>";
                }
                echo "vendido";
                exit();

                
                






        
             
        
        
        
            }
        }


    }
}








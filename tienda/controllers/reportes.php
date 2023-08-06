<?php
require_once 'Products.php';


    class Reportes extends Products{

        public function finAllReporFuction(){

            $query1 =$this->DBH->query("SELECT vender.id_venta, vender.name_client, vender.pagar, vender.id_produc, vender.fecha_venta, user.username, add_products.name_product,add_products.cantidad
            FROM user
            JOIN vender ON vender.id_user = user.id_user
            JOIN add_products ON vender.id_produc = add_products.id_produc");
        

            

                while ($fila = $query1->fetch(PDO::FETCH_OBJ)){
                   $data[] = $fila;
               }   
               if(isset($data)){

                   return $data;
               }
      


     
        }
        public function finReportFuction(){
            $query2 =$this->DBH->query("SELECT COUNT(id_venta) as total_ventas, (FORMAT(SUM(pagar), 2)) as valor_total
            FROM vender;");
        
            while ($fila = $query2->fetch(PDO::FETCH_OBJ)){
                $data[] = $fila;
            }   
            if(isset($data)){

                return $data;
            }
   

        }

        public function finDeudoresFution(){
            $query =  $this->DBH->query('SELECT * FROM deudores;');
            while ($fila = $query->fetch(PDO::FETCH_OBJ)){
                $data[] = $fila;
            }   
            if(isset($data)){

                return $data;
            }
   
        }

        public function finDevolucionFution(){
            $query =  $this->DBH->query('SELECT * FROM devolucion;');
            while ($fila = $query->fetch(PDO::FETCH_OBJ)){
                $data[] = $fila;
            }   
            if(isset($data)){

                return $data;
            }
   
        }
    }
?>
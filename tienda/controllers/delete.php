<?php
require_once 'Products.php';
    
    class DeleteCliente extends Products{

        public function delete($id){

            $query = "DELETE FROM deudores WHERE id =:id";
            $sentencia = $this->DBH->prepare($query);
            $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
            $sentencia->execute();

            return "Sussely";

        }

        public function deleteProdutosReportesFuntion($id_venta,  $id_produc){

            $query1 = "DELETE FROM vender WHERE id_venta =:id_venta";
            $sentencia = $this->DBH->prepare($query1);
            $sentencia->bindParam(':id_venta', $id_venta, PDO::PARAM_INT);
            $sentencia->execute();

            $query2 = "DELETE FROM add_products WHERE id_produc =:id_produc";
            $sent = $this->DBH->prepare($query2);
            $sent->bindParam(':id_produc', $id_produc, PDO::PARAM_INT);
            $sent->execute();


            return "Sussely";
            

        }

        public function deleteProduct($id_produc){

            $query = "DELETE FROM add_products WHERE id_produc =:id_produc";
            $selenticia = $this->DBH->prepare($query);
            $selenticia->bindParam(':id_produc', $id_produc, PDO::PARAM_INT);
            $selenticia->execute();

                   
             return "Sussely";   

        }


        public function deleteDeudor($id_deudor) {

        $query = "DELETE FROM deudores WHERE id_deudor =:id_deudor";
            $selenticia = $this->DBH->prepare($query);
            $selenticia->bindParam(':id_deudor', $id_deudor, PDO::PARAM_INT);
            $selenticia->execute();

                   
             return "Sussely";   
            
        }


        public function deleteDevolver($id_devolver) {

            $query = "DELETE FROM devolucion WHERE id =:id_devolver";
                $selenticia = $this->DBH->prepare($query);
                $selenticia->bindParam(':id_devolver', $id_devolver, PDO::PARAM_INT);
                $selenticia->execute();
    
                       
                 return "Sussely";   
                
            }
    





    }




?>
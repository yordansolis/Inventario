<?php
    
  
    include '../controllers/delete.php';
    $model = new DeleteCliente();
    #elimina deudores
    if(isset($_REQUEST['id'])){
        $id  = $_REQUEST['id'];
        $delete = $model->delete($id);    
        if($delete){
        
            echo "<script>alert(' Eliminado con exito ');</script>";    
            echo "<script>window.location.href = 'debtors.php';</script>";

        }
    }


    #elimina reportes y productos
    if(!empty($_REQUEST['id_venta']) && !empty($_REQUEST['id_produc'])){
        $id_venta =$_REQUEST['id_venta'];
        $id_produc =$_REQUEST['id_produc'];
        
        $delete = $model->deleteProdutosReportesFuntion($id_venta ,$id_produc ); 
        if($delete){
            echo "<script>alert('delete successfully');</script>";
            echo "<script>window.location.href = 'report.php';</script>";
        }
    
    }

       #elimina productos
       if(isset($_REQUEST['id_produc'])){
        $id_produc =$_REQUEST['id_produc'];
        $delete = $model->deleteProduct($id_produc);
        if($delete){
            echo "<script>alert('delete successfully');</script>";
            echo "<script>window.location.href = 'report.php';</script>";
        }
    
    }

          #elimina deudores
          if(isset($_REQUEST['id_deudor'])){
            $id_deudor =$_REQUEST['id_deudor'];
            $delete = $model->deleteDeudor($id_deudor);
            if($delete){
                echo "<script>alert('delete successfully');</script>";
                echo "<script>window.location.href = 'report.php';</script>";
            }
        
        }

                 #elimina productos
                 if(isset($_REQUEST['id_devolver'])){
                    $id_devolver =$_REQUEST['id_devolver'];
                    $delete = $model->deleteDevolver($id_devolver);
                    if($delete){
                        echo "<script>alert('delete successfully');</script>";
                        echo "<script>window.location.href = 'report.php';</script>";
                    }
                
                }
    







?>
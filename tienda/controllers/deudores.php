<?php


require_once 'Products.php';

class Deudores extends Products{


    public function deudoresFunction(){
        
     
            if (isset($_POST['nombre']) && isset($_POST['tel']) && isset($_POST['direcion']) && isset($_POST['nota']) && isset($_POST['precio']) && isset($_POST['fecha'])){
              
                
                $datos = array(
                    'nombre' => $_POST['nombre'],
                    'tel' => $_POST['tel'], 
                    'direcion' => $_POST['direcion'], 
                    'nota' => $_POST['nota'], 
                    'precio' => $_POST['precio'], 
                    'fecha' => $_POST['fecha'],
                );

                $query = 'INSERT INTO `deudores`( `nombre`, `tel`, `direcion`, `nota`, `precio`, `fecha`) VALUES (?,?,?,?,?,?)';
                $sentencia  = $this->DBH->prepare($query)->execute(array(
                    $datos['nombre'],
                    $datos['tel'],
                    $datos['direcion'],
                    $datos['nota'],
                    $datos['precio'],
                    $datos['fecha']
                ));

                echo "<script>alert('Agregado successfully');</script>";
                echo "<script>window.location.href = '../views/debtors.php';</script>";

            }

    }

    public function finAllDeudor(){
      

        $query =$this->DBH->query('SELECT * FROM deudores');

        while ($fila = $query->fetch(PDO::FETCH_OBJ)){
            $data[] = $fila;
        }          
        if(isset($data)){

            return $data;
        }


    }


}
?> 
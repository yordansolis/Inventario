<?php

require_once 'Products.php';

    class Devolver extends Products{

        public function functionDevolver() { 

            if (isset($_POST['name_client']) && isset($_POST['tel']) && isset($_POST['direc']) && isset($_POST['precio']) && isset($_POST['fecha']) && isset($_POST['vendedor'])&& isset($_POST['nota'])) {

                $datos  = array(
                    'name_client' => $_POST['name_client'],
                    'tel' => $_POST['tel'],
                    'direc' => $_POST['direc'],
                    'precio' => $_POST['precio'],
                    'fecha' => $_POST['fecha'],
                    'vendedor' => $_POST['vendedor'],
                    'nota' => $_POST['nota'],
                );

              


                $query = 'INSERT INTO devolucion(name_client, tel, direc, precio, fecha, vendedor, nota) VALUES (?,?,?,?,?,?,?)';

               $upload =  $this->DBH->prepare($query)->execute(array(
                    $datos['name_client'],
                    $datos['tel'],
                    $datos['direc'],
                    $datos['precio'],
                    $datos['fecha'],
                    $datos['vendedor'],
                    $datos['nota']
                ));

                
                if($upload){
                    echo "<script>alert('Agregado successfully');</script>";
                    echo "<script>window.location.href = '../views/return.php';</script>";
                }
                echo "vendido";
                exit();









            }            
        }
    }



?>
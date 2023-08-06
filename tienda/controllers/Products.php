        <?php
                
            class Products{              
                public   $datos; 
                protected $host = 'localhost';
                protected $dbname = 'db_tienda';
                protected $user = 'root';
                protected $pass= '';
                protected $DBH;


                
                public function __construct()   
                {
                try{

                    $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);

                    


                }catch(Exception $e){
                    echo " ** Eror de conexión" . $e->getMessage();
                }           
                }

                // Creando un método en la clase para recibir el arreglo:
                public function fetch() {
                    $data = null;
                    
                    $query = $this->DBH->query('SELECT  id_produc, name_product, talla, cantidad, precio, filename, username  from add_products 
                    join user 
                    on add_products.id_user  = user.id_user');           

                    while ($fila = $query->fetch(PDO::FETCH_OBJ)){
                        $data[] = $fila;
                    }          
                    if(isset($data)){

                        return $data;
                    }
           
                }

            
            
            
                public function search($id_product){

                    $query = "SELECT * FROM add_products WHERE id_produc =:id";

                    $sentencia = $this->DBH->prepare($query);
                    $sentencia->bindParam(':id', $id_product, PDO::PARAM_INT);
                    $sentencia->execute();

                    $product = $sentencia->fetch(PDO::FETCH_ASSOC);
                    if($product){

                       
                        if(isset($product)){

                            return $product;
                        }
                    }
                    echo ("El producto no existe <br /> <br />");
                    die ( '<a href="sell.php" class="btn btn-info">Regresar</a> ');



                

            
                }
                


            }

        ?>

<?php

require_once 'Products.php';

class Insert extends Products
{

    public function insert()
    {

        if (isset($_POST['submit'])) {

            if (isset($_POST['name_producto']) && isset($_POST['talla']) && isset($_POST['cantidad']) && isset($_POST['precio']) && isset($_FILES['filename']) && isset($_POST['id_user'])) {


                if (!empty($_POST['name_producto']) && !empty($_POST['talla']) && !empty($_POST['precio']) && !empty($_POST['cantidad']) && !empty($_FILES['filename']) && !empty($_POST['id_user'])) {

                    // Get reference to uploaded image
                    $filename = $_FILES["filename"];
                    // Image not defined, let's exit


                    if (!isset($filename)) {
                        die('No cargo la imagen .');
                    }

                    // Exit if image file is zero bytes
                    if (filesize($filename["tmp_name"]) <= 0) {
                        die('Uploaded file has no contents.');
                    }

                    // Exit if is not a valid image file
                    $imge_type = exif_imagetype($filename['tmp_name']);
                    if (!$imge_type) {
                        die("lo que esta tratando de cargar no es una img");
                    }

                    // Get file extension based on file type, to prepend a dot we pass true as the second parameter
                    $image_extension = image_type_to_extension($imge_type, true);

                    // Create a unique image name
                    $image_name = bin2hex(random_bytes(7)) . $image_extension;

                    // Move the temp image file to the images/ directory
                    move_uploaded_file(
                        //mueve el archivo temporal al directorio img/
                        $filename['tmp_name'],

                        __DIR__ . "/../media/img/" . $image_name

                    );




                    $datos  = array(
                        'name_producto' => $_POST['name_producto'],
                        'talla' => $_POST['talla'],
                        'cantidad' => $_POST['cantidad'],
                        'precio' => $_POST['precio'],
                        'filename' => $image_name,
                        'id_user' => $_POST['id_user'],
                    );



                    $query = 'INSERT INTO `add_products` (`name_product`, `talla`, `cantidad`, `precio`, `filename`, `id_user`) VALUES (?,?,?,?,?,?);';

                    $this->DBH->prepare($query)->execute(array(
                        $datos['name_producto'],
                        $datos['talla'],
                        $datos['cantidad'],
                        $datos['precio'],
                        $datos['filename'],
                        $datos['id_user']
                    
                    ));

                    echo "<script>
                        Swal.fire({
                        title: 'Procesando...',
                        text: 'Proceso exitoso!',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        timer: 3000 // Tiempo en milisegundos (3 segundos en este ejemplo)
                    }).then(() => {
                        window.location.href = '../views/add_produtcs.php' ;
                    });
                  </script>";



    



                }
            }
        }
    }
}

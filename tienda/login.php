<?php

$navar = "login";
$title ="Login";
include('layouts/header.php');

require_once('db/connection.php');

if($_POST){


   $username = $_POST['username'];
   $password = $_POST['password'];
    $error = array();

      if (!$username) {
        $error[] = "Falta el nombre de usuario!";
          }
          
          if (!$password) {
              $error[] = "Falta el nombre de contraseña!";
          }


      if (count($error)) {
          echo "El array está vacío.";
          echo "Enviar datos  lista de errors";  
      } else {
     
        #obtenemos el id del usuario
        $id_query = 'SELECT * FROM user  WHERE username =:username';
        $select_user = $connet->prepare($id_query);
        $select_user->execute([':username' => $username]);
        $id_user = $select_user->fetch(PDO::FETCH_ASSOC);
     

         #obtenemos el password el usuario
        $query = 'SELECT password FROM user WHERE username = :username';
        $sentencia = $connet->prepare($query);
        $sentencia->execute([':username' => $username]);
        $resul_password = $sentencia->fetch(PDO::FETCH_ASSOC); 
   
    
    if ($resul_password && password_verify($password, $resul_password['password'])) { 

        echo  "las credenciales son  correctas <br>";
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['id_user'] = $id_user['id_user'];
        $_SESSION['logueado'] = true;
        header('location: views/sesiones.php');

        
      }else{

        echo  "las credenciales son incorrectas!";
      }
        
    }


        

}



?> <section class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 p-5">
            <div class="card ">
                <div class="card-header"> Iniciar sesión </div>
                <div class="card-body">
                    <div class="mb-3">
                        <form action="" method="post">
                            <label for="username" class=" form-label">Usuario:</label>
                            <input type="text" class="form-control " name="username" id="username"
                                placeholder="Escriba su usuario:">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control mb-4 " name="password" id="password"
                            placeholder="Escrba su contraseña">
                    </div>
                    <button type="submit" class="btn btn-dark mb-4">Ingresar</button>
                    <br>
                    <a href="register.php" class="p-4 m-3">Registrarse</a>
                </div>
                </form>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</section>
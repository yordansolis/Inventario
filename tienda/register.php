<?php

$navar = "login";
$title ="Registro";
include('layouts/header.php');

require_once('db/connection.php');

if($_POST){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  $error = array();
  
  $username ? $username:  $error[] = "Falta el nombre de usuario !"; 
  $email ? $email:  $error[] = "Falta el nombre de email !"; 
  $password1 ? $password1:  $error[] = "Falta el nombre de password1 !"; 
  $password2 ? $password2:  $error[] = "Falta el nombre de password2 !";

      if (count($error)) {
          echo "El array está vacío.";
          echo "Enviar datos  lista de errors";  
      } else {
          
          if ($password1  != $password2){
               $error[] = "La contraseña no es igual !";
               var_dump($error);
          }else{


            //verificar que el usuario exista ! 
            $query = 'SELECT username, password 
            FROM user WHERE  username = :username AND email = :email';
            $stmt =$connet->prepare($query);

            $stmt->execute([':username' => $username, ':email' => $email]);

             $result  = $stmt->fetchAll();
       
             if($result){ 

              echo "error puede ultilizar el usuario 2 veces";

             }else {

              echo "reegistrar nuevo usuario";
           


            $sql = "INSERT INTO user(username, email, password)VALUES(:username, :email, :password1)";

            
            $sentencia =$connet->prepare($sql);
              //** 4 son los parametros abmitidos  */
        
              $pwd  = password_hash($password1, PASSWORD_DEFAULT);
            
              $sentencia->bindParam(':username', $username,PDO::PARAM_STR);
              $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
              $sentencia->bindParam(':password1', $pwd, PDO::PARAM_STR);
              
           
              $sentencia->execute();
              
              #selecionamos usuario con un al
              $users = $connet->prepare('SELECT *,COUNT(*) AS n_users
              FROM user  
              WHERE username=:username AND email=:email');

              /*@see cambiar por password   */  
               $users->execute([':username' => $username, ':email' => $email]);
        
              $user  = $users->fetch(PDO::FETCH_LAZY);

              print_r($user);

              if($user['n_users'] >= 1 ){
                #session 
                # msj ="Benvenido al sistema";
                $_SESSION['username'] = $user['username'];
                $_SESSION['logueado'] = true;

                header('location: views/home.php');

              }
              else{
                echo "Error: el usuario o la contraseña es incorrecto";

              }
              

          }



        }


        }


}



?> <section class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 p-5">
            <div class="card ">
                <div class="card-header"> Registrar </div>
                <div class="card-body">
                    <div class="mb-3">
                        <form action="" method="post">
                            <label for="username" class="form-label">Usuario:</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Nombre de usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control " name="email" id="email" aria-describedby="emailHelpId"
                            placeholder="abc@mail.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password1" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control mb-4 " name="password1" id="password1"
                            placeholder="Contraseña" required>
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Conformar contraseña:</label>
                        <input type="password" class="form-control mb-4 " name="password2" id="password2"
                            placeholder="Comfirmar contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-dark mb-4">Registrar</button>
                    <br>
                    <a href="login.php" class="p-4 m-3">login</a>
                </div>
                </form>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</section>
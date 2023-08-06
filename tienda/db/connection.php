<?php
    
    $host = "localhost"; 
    $usuario ="root";
    $password="";
    $badeDB = "db_tienda";
    
    $dsn = 'mysql:host=' .$host. ';dbname=' . $badeDB;
    
    $connet = new PDO($dsn, $usuario, $password);
    //Agregar el setAtribute de manera global para no estra repidiento el ATTER_DEFAUL
    $connet->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ );

    // if($connet){
    //     echo "conexion exitosa ! ";
    // }
    // else{
    //     echo "error de conexión";
    // }




?>
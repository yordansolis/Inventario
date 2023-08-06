<!doctype html>
<html lang="en">

<head>
  <title><?php  echo $title ? $title : "title"; ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- My icono web-->
  <link rel="icon" href="../icon.png" type="image/x-icon">



  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">



       <!--  JQUERY  versión:  jQuery Mobile 1.4.5  -->
       <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!--  fin -->


    <!-- Datatable  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <!--  fin -->

<!-- Iconos boostrapv5  -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--  fin -->


    <!--  Datatable  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <!--  fin -->


    <!-- Icon-->
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
    <!--  fin -->



    <head>
    <!-- Other head elements -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>


    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../static/css/style.css">
</head>

<body>
  <header>
      <nav class="navbar navbar-expand navbar-dark bg-dark">
          <ul class="nav navbar-nav">
  
    <?php
        if($navar == "login"): ?>

        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="register.php">Registrar</a>
        </li>
        <?php endif; ?>

        <?php if($navar == "views"): ?>

           <li class="nav-item">
            <a class="nav-link" href="home.php">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="add_produtcs.php">Productos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="sell.php">Vender</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="return.php">Devueltos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="debtors.php">Deudores</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="report.php">Reportes</a>
        </li>


        <li class="nav-item d-flex justify-content-end">
          <a class="nav-link ms-auto" href="../controllers/cerrar.php">Cerrar sesíon</a>
        </li>
        

  
        <?php  

      $usuario = $_SESSION['username']; 
      ?>



         
   
        <?php endif; ?>

      </ul>
    </nav> 
    </header>


  
       
  <li class="nav justify-content-end">
    <a class="nav-link  text-info" aria-current="page" href=""> <?php    
      if(isset($usuario)){
        echo "Bienvenido ".  $usuario;
      }; ?>
      
    </a>
  </li> 
    

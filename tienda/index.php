<head>
    <!-- Other head elements -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>


<form method="post">
    <!-- Form fields here -->
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($_POST['submit'])) {
    // Process form submission
    echo '<script>
            Swal.fire({
                title: "Success",
                text: "Proceso exitoso!",
                icon: "success",
                confirmButtonText: "OK"
            });
          </script>';
}
?>


<?php
$n1 = 2;
#$n2= 4;
    if(isset($n1)&&  isset($n2)){
        echo "esta bien";
    }
?>

<?php
session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $errors = [];
        if(empty($_POST['phone'])){
        $errors['phone'] = "<p class='text-danger font-weight-bold'> * phone is required </p>";
        }
        if (empty($errors)){
            $_SESSION['phone'] = $_POST['phone'];
//            echo$_SESSION['phone'];
            header('location:review.php');die;
        }
    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/all.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <title>Task2</title>
    </head>
    <body class="d-flex flex-column min-vh-100">
    <?php $name = "Hospital";
    require  "../includes/navbar.php";
    ?>

         <section class="my-5">
             <div class="container my-5">
                 <div class="row ">
                     <div class="col-md-3">
                     </div>
                     <div class="col-md-6 my-5">
                         <form  method="post" action="">
                             <div class="mb-3">
                                 <label for="exampleInputEmail1" class="form-label text-capitalize">phone</label>
                                 <input type="tel" class="form-control" id="exampleInputEmail1" name="phone">
                                 <?= $errors['phone'] ?? "" ?>
                             </div>
                             <button type="submit" class="btn btn-dark">Submit</button>
                         </form>
                     </div>
                     <div class="col-md-3"></div>
                 </div>
             </div>
         </section>

         <?php include "../includes/footer.php"?>

        <script src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>


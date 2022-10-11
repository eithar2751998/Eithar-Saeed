<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errors = [];
    if(empty($_POST['name'])){
        $errors['name'] = "<p class='text-danger'>* Name is required </p>";
    }
    if(empty($_POST['count'])){
        $errors['count'] = "<p class='text-danger'>* count is required </p>";
    }
    if(empty($errors)){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['count'] = $_POST['count'];
//        print_r($_SESSION);
        header('location:games.php');die();
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
        <?php $name = "Club";
        require  "../includes/navbar.php";
        ?>

        <section class="my-5">
            <div class="container">
                <div class="row ">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6 my-5">
                        <form  method="post" action="" class="">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label text-capitalize  fs-5 text-success"> member name</label>
                                <input type="text" class="form-control border border-secondary" id="exampleInputEmail1" name="name" value="<?= $_POST['name'] ?? ""?>">
                                <p class="fw-light text-secondary m-0">club subscription starts with <span class="fw-normal">10,000 LE</span></p>
                                <?= $errors['name'] ?? "" ?>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label text-capitalize  fs-5 text-success"> count of family members</label>
                                <input type="number" class="form-control border border-secondary rounded-3" id="exampleInputEmail1" name="count" value="<?= $_POST['count'] ?? ""?>">
                                <p class="fw-light text-secondary m-0">cost of each member is <span class="fw-normal">2,500 LE</span></p>
                                <?= $errors['count'] ?? "" ?>
                            </div>
                            <div class='d-grid gap-2'>
                                 <button type="submit" class="btn btn-success fs-5">Submit</button>
                            </div>
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


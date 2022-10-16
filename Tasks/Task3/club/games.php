<?php
session_start();
//print_r($_SESSION);
$form = "";
for ($i=1; $i<=$_SESSION['count']; $i++){
    $form .= "<div class='mb-3'>
                <label for='exampleInputEmail1' class='form-label text-capitalize  fs-4 text-success'> member [$i]</label>
                <input type='text' class='form-control border border-secondary' id='exampleInputEmail1' placeholder='member name' name='members[$i][name]' value=''>
               
                <div class='form-check pt-3'>
                    <input class='form-check-input' type='checkbox' value='football' name='members[$i][games][football]'>
                    <label class='form-check-label text-capitalize px-2' > football <span class='fw-bold'>300 lE</span> </label>
                </div>
                <div class='form-check pt-3'>
                    <input class='form-check-input' type='checkbox' value='swimming' name='members[$i][games][swimming]'>
                    <label class='form-check-label text-capitalize px-2' for='Check1'> Swimming <span class='fw-bold'>250 lE</span> </label>
                </div>
                <div class='form-check pt-3'>
                    <input class='form-check-input' type='checkbox' value='volleyball' name='members[$i][games][volley]'>
                    <label class='form-check-label text-capitalize px-2' > Volley ball <span class='fw-bold'>150 lE</span> </label>
                </div>
                <div class='form-check pt-3'>
                    <input class='form-check-input' type='checkbox' value='other' name='members[$i][games][other]' >
                    <label class='form-check-label text-capitalize px-2' > Others <span class='fw-bold'>100 lE</span> </label>
                </div>
            </div>";



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
        <?php
        $name = "Club";
        require  "../includes/navbar.php";
        ?>

        <section class="my-5">
            <div class="container">
                <div class="row ">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6 my-5">
                        <form  method="post" action="result.php" class="">
                                <?= $form ?>
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


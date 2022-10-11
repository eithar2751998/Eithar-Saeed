
<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $errors = [];
        if(empty($_POST['name'])){
            $errors['name'] = "<p class='text-danger'> * username is Required </p>";
        }
        if(empty($_POST['amount'])){
            $errors['amount'] = "<p class='text-danger'> * loan amount is Required </p>";
        }
        if(empty($_POST['years'])){
            $errors['years'] = "<p class='text-danger'> * loan years is Required </p>";
        }
        $result = [];
        $rate = 0;
        if($_POST['years'] <= 3){
            $rate = 0.1;
        }
        else{
            $rate = 0.15;
        }
        $result['name'] = $_POST['name'];
        $result['total Rate'] = $rate * $_POST['amount'] * $_POST['years'] ;
        $result['loan After Interest'] = $_POST['amount'] + $result['total Rate'];
        $result['monthly'] = $result['loan After Interest'] / ($_POST['years'] * 12);

        $table = "<table class='table table-dark table-striped mt-5'>
                    <thead>
                        <tr>";
                            foreach ($result as $property => $value) $table.= "<th class='text-capitalize'> {$property} </th>";
                        $table.="</tr>
                    </thead>
                    <tbody>
                        <tr>";
                        foreach ($result as $value) $table.= "<td> {$value} </td>";
                       $table.="</tr>
                    </tbody>
                  </table>";

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
        <title>Bank</title>
    </head>
    <body class="d-flex flex-column min-vh-100">

        <?php $name = "Bank";
        require  "../includes/navbar.php";
        ?>
        <section class="my-5">
            <div class="container ">
                <div class="row ">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-6 my-5">
                        <form  method="post" >
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label text-capitalize">User name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?= $_POST['name'] ?? '' ?>">
                                <?= $errors['name'] ?? "" ?>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label text-capitalize">Laon Amount</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="amount" value="<?= $_POST['amount'] ?? '' ?>">
                                <?= $errors['amount'] ?? "" ?>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label text-capitalize">Laon Years</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name="years" value="<?= $_POST['years'] ?? ''?>">
                                <?= $errors['years'] ?? "" ?>
                            </div>
                            <button type="submit" class="btn btn-dark">Calculate</button>
                        </form>

                        <?= $table ?? '' ?>

                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </section>


        <?php include "../includes/footer.php"?>

        <script src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>



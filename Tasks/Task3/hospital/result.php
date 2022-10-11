<?php
session_start();
//print_r($_SESSION);
$result = 0;
 foreach($_SESSION AS $question){
    if(gettype($question) == 'object' || gettype($question) == 'array'){
        foreach ($question as $key => $value){
            if($key === 'answer'){
                $result += $value ;
            }
        }
    }
}
if($result < 25){
    $massage = "<p class='text-danger pt-3 fw-bold fs-3'> We will call you later on this phone :{$_SESSION['phone']} </p>";
}
else{
    $massage = "<p class='text-success pt-3 fw-bold fs-3'> Your Result is Good, Thanks </p>";
}
session_destroy();
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

        <div class="container my-5">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-dark table-striped mt-5">
                        <thead>
                        <tr>
                            <th scope="col" class="text-capitalize">question</th>
                            <th scope="col" class="text-capitalize">reviews</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($_SESSION AS $question){
                                if(gettype($question) == 'object' || gettype($question) == 'array'){ ?>
                                    <tr>
                                        <td>
                                            <?php
                                            foreach ($question as $key => $value){
//
                                                if($key === 'answer'){
                                                    if($value == 0){

                                                        echo "<td> Bad </td>";
                                                    }
                                                    elseif ($value == 3){
                                                        echo "<td> Good </td>";
                                                    }
                                                    elseif ($value == 5){
                                                        echo "<td> Very Good </td>";
                                                    }
                                                    else{
                                                       echo "<td> Excellent </td>";
                                                    }
                                                }
                                                else{
                                                echo $value;
                                                }
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                            }?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="2" class="text-center"><?=$massage?> </td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <?php include "../includes/footer.php"?>

        <script src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>


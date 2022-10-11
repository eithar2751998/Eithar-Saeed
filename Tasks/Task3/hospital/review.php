<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];
    if(!isset($_POST['ans1'])){
        $errors['ans1'] = "<p class='text-danger font-weight-bold'> * Answer Question One Is Required</p>";
    }
    if(!isset($_POST['ans2'])){
        $errors['ans2'] = "<p class='text-danger font-weight-bold'> * Answer Question Two Is Required</p>";
    }
    if(!isset($_POST['ans3'])){
        $errors['ans3'] = "<p class='text-danger font-weight-bold'> * Answer Question Three Is Required</p>";
    }
    if(!isset($_POST['ans4'])){
        $errors['ans4'] = "<p class='text-danger font-weight-bold'> * Answer Question Four Is Required</p>";
    }
    if(!isset($_POST['ans5'])){
        $errors['ans5'] = "<p class='text-danger font-weight-bold'> * Answer Question Five Is Required</p>";
    }

    if (empty($errors)){
        session_start();
        $_SESSION['question1'] = ['question' => $_POST['q1'], 'answer' => $_POST['ans1']];
        $_SESSION['question2'] = ['question' => $_POST['q2'], 'answer' => $_POST['ans2']];
        $_SESSION['question3'] = ['question' => $_POST['q3'], 'answer' => $_POST['ans3']];
        $_SESSION['question4'] = ['question' => $_POST['q4'], 'answer' => $_POST['ans4']];
        $_SESSION['question5'] = ['question' => $_POST['q5'], 'answer' => $_POST['ans5']];

        header('location:result.php');die;
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
        <div class="container my-5">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form method="post">
                        <?= $errors['ans1'] ?? "" ?>
                        <?= $errors['ans2'] ?? "" ?>
                        <?= $errors['ans3'] ?? "" ?>
                        <?= $errors['ans4'] ?? "" ?>
                        <?= $errors['ans5'] ?? "" ?>

                        <table class="table table-dark table-striped mt-5">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-capitalize">#</th>
                                    <th scope="col" class="text-capitalize">question</th>
                                    <th scope="col" class="text-capitalize text-center">bad</th>
                                    <th scope="col" class="text-capitalize text-center">good</th>
                                    <th scope="col" class="text-capitalize text-center">very good</th>
                                    <th scope="col" class="text-capitalize text-center">excellent</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <label> Are you satisfied with the level of hygiene ?</label>
                                        <input type="hidden" name="q1" value="Are you satisfied with the level of hygiene ?">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans1" value="0">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans1" value="3">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans1" value="5">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans1" value="10">
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <label> Are you satisfied with that ? </label>
                                        <input type="hidden" name="q2" value="Are you satisfied with that ?">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans2" value="0">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans2" value="3">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans2" value="5">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans2" value="10">
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <label> Are you satisfied with the nursing service ? </label>
                                        <input type="hidden" name="q3" value="Are you satisfied with the nursing service ?">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans3" value="0">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans3" value="3">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans3" value="5">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans3" value="10">
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <label > Are you satisfied with doctors ? </label>
                                        <input type="hidden" name="q4" value="Are you satisfied with doctors ?">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans4" value="0">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans4" value="3">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans4" value="5">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans4" value="10">
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <label> Are you okay with me being quiet at the hospital ? </label>
                                        <input type="hidden" name="q5" value="Are you okay with me being quiet at the hospital ?">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans5" value="0">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans5" value="3">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans5" value="5">
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="radio" name="ans5" value="10">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center mt-5 btn-group-lg" role="group">
                            <input type="submit" class="btn btn-dark "  value="Submit">
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>

        </div>


        <?php include "../includes/footer.php"?>

        <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>


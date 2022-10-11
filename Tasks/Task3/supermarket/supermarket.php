<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];
    if(isset($_POST['form1'])){
        if(empty($_POST['name'])){
            $errors['name'] = "<p class='text-danger'>* username is required </p>";
        }
        if(!isset($_POST['city'])){
            $errors['city'] = "<p class='text-danger'>* city is required </p>";
        }
        if(empty($_POST['NOfP'])){
            $errors['NOfP'] = "<p class='text-danger'>* Num of Products is required </p>";
        }
        else{
            $products = "<table class='table table-dark table-striped mt-4'>
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantities</th>
                                </tr>
                            </thead>
                            <tbody>";
            for ($i = 0; $i < $_POST['NOfP']; $i++){
                $products .= "  <tr>
                                    <td><input type='text' name='pName[]' required></td>
                                    <td><input type='number' name='pPrice[]' required></td>
                                    <td><input type='number' name='pQuantity[]' required></td>
                                </tr>";
            }
            $products.="</tbody>
                         </table>
                         <div class='d-grid gap-2'>
                            <button type='submit' class='btn btn-primary fs-5' name='form2'> Receipt </button>
                        </div>";
        }

    }
    if(isset($_POST['form2'])){
        $city_name ="" ;
        $total = 0;
        if($_POST['city'] == 0){
            $city_name = "cairo";
        }
        else if($_POST['city'] == 30){
            $city_name = "giza";
        }
        else if($_POST['city'] == 50){
            $city_name = "alex";
        }
        else {
            $city_name = "other";
        }
        $result = "<table class='table table-dark table-striped mt-4'>
                        <thead>
                            <tr>
                                <th class='text-capitalize'>product name</th>
                                <th class='text-capitalize'>price</th>
                                <th class='text-capitalize'>quantities</th>
                                <th class='text-capitalize'>sub total</th>
                            </tr>
                        </thead>
                        <tbody>";
                            for ($i=0 ; $i<count($_POST['pName']); $i++){
                                $subTotal = $_POST['pQuantity'][$i] * $_POST['pPrice'][$i];
                                $result .= "<tr>
                                                <td>{$_POST['pName'][$i]}</td>
                                                <td>{$_POST['pPrice'][$i]}</td>
                                                <td>{$_POST['pQuantity'][$i]}</td>
                                                <td>{$subTotal}</td>
                                            </tr>";
                                $total += $subTotal;
                                }
                            if($total < 1000){
                                $discount = $total * 0;
                            }
                            else if($total < 3000){
                                $discount = $total * 0.1;
                            }
                            else if($total < 4500){
                                $discount = $total*0.15;
                            }
                            else if($total >= 4500){
                                $discount = $total * 0.2;
                            }
                            $totalAfterDisc = $total - $discount ;
                            $netTotal = $totalAfterDisc +$_POST['city'];
                            $result .= "<tr>
                                            <th colspan='2' class='text-capitalize'>client name</th>
                                            <td colspan='2'>{$_POST['name']}</td>
                                        </tr>
                                        <tr>
                                            <th colspan='2' class='text-capitalize'>city</th>
                                            <td colspan='2'>{$city_name}</td>
                                        </tr>
                                        <tr>
                                            <th colspan='2' class='text-capitalize'>total</th>
                                            <td colspan='2'>{$total} EGP</td>
                                        </tr>
                                        <tr>
                                            <th colspan='2' class='text-capitalize'>discount</th>
                                            <td colspan='2'>{$discount} EGP</td>
                                        </tr>
                                        <tr>
                                            <th colspan='2' class='text-capitalize'>total after discount</th>
                                            <td colspan='2'>{$totalAfterDisc} EGP</td>
                                        </tr>
                                        <tr>
                                            <th colspan='2' class='text-capitalize'>delivry</th>
                                            <td colspan='2'>{$_POST['city']} EGP</td>
                                        </tr
                                        <tr>
                                            <th colspan='2' class='text-capitalize'>net total</th>
                                            <td colspan='2'>{$netTotal} EGP</td>
                                        </tr>";
            $result .="</tbody>
                   </table> ";
    }


//    print_r($_POST);
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
        <?php $name = "Supermarket";
        require  "../includes/navbar.php";
        ?>

        <section class="my-5">
            <div class="container">
                <div class="row ">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8 my-5">
                        <form method="post">
                            <div class="mb-3">
                                <label for="name" class="form-label text-capitalize">username</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?=$_POST['name'] ?? '' ?>">
                                <?= $errors['name'] ?? "" ?>
                            </div>
                            <div class="mb-3">
                                <label for="city"  class="form-label text-capitalize">City</label>
                                <select class="form-select" aria-label="Default select example" id="city" name="city"  >
                                    <option value="0" <?= isset($_POST['city']) == 0 ? 'selected' : '' ?> > Cairo </option>
                                    <option value="30" <?= isset($_POST['city'])== 30 ? 'selected' : '' ?> > Giza </option>
                                    <option value="50" <?= isset($_POST['city']) == 50 ? 'selected' : '' ?> > Alex</option>
                                    <option value="100" <?= isset($_POST['city']) == 100 ? 'selected' : '' ?> > Other </option>
                                </select>
                                <?= $errors['city'] ?? "" ?>
                            </div>
                            <div class="mb-3">
                                <label for="NOfP" class="form-label text-capitalize">Number Of Products</label>
                                <input type="number" class="form-control" id="NOfP" name="NOfP"  value="<?=$_POST['NOfP'] ?? '' ?>">
                                <?= $errors['NOfP'] ?? "" ?>
                            </div>
                            <div class="d-grid gap-2">
                              <button type="submit" class="btn btn-primary fs-5" name= "form1">Enter Products</button>
                            </div>
                            <?= $products ?? "" ?>

                            <?= $result ?? "" ?>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>

        <?php include "../includes/footer.php"?>

        <script src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>


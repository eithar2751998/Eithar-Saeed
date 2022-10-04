<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title>Document</title>
    </head>
    <body>
    <?php
            if(isset($_POST['sub'])){
                $num1=$_POST['n1'];
                $num2=$_POST['n2'];
                $oprnd=$_POST['sub'];
                if($oprnd=="+")
                    $ans=$num1+$num2;
                else if($oprnd=="-")
                    $ans=$num1-$num2;
                else if($oprnd=="x")
                    $ans=$num1*$num2;
                else if($oprnd=="/")
                    $ans=$num1/$num2;
            }?>
        <div class="container">
            <form method="post" action="">
                <h1 class="text-success mb-4">Simple Calculator</h1>
                <div>
                    <label for="num1" class="col-sm-2 col-form-label">First Number:</label>
                    <input  class="number" name="n1" value="" id="num1">
                </div>
                <div>
                    <label for="num2" class="col-sm-2 col-form-label">Second Number:</label>
                    <input class="number" name="n2" value="" id="num2">
                </div>
               <div class="operators">
                    <input type="submit" class="oper" name="sub" value="+">
                    <input type="submit" class="oper" name="sub" value="-">
                    <input type="submit" class="oper" name="sub" value="x">
                    <input type="submit" class="oper" name="sub" value="/">
               </div>
                <div>
                    <label for="result" class="col-sm-2 col-form-label">Result:</label>
                    <input type='text' class="number" value="<?php if(isset($ans) ) echo $ans; ?>" id="result">
                </div>
                
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
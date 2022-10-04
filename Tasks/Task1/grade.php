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

function Grade($grades) {

$average = ( $grades / 500 ) * 100;

if($average >= 90){
    $grade = 'Grade A';
}
elseif($average >= 80){
    $grade = 'Grade B';
}
elseif($average >= 70){
    $grade = 'Grade C';
}
elseif($average >= 60){
    $grade = 'Grade D';
}
elseif($average >= 40){
    $grade = 'Grade E';
}
else{
    $grade = 'Grade F';
    }
echo " percentage : {$average} {$grade} " ;
}

$grades=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["grade1"] < 0 || $_POST["grade1"] > 100)   {
    echo "Error! Check Input.";
    } elseif ($_POST["grade2"] < 0 or $_POST["grade2"] > 100) {
    echo "Error! Check Input.";
    } elseif ($_POST["grade3"] < 0 or $_POST["grade3"] >100)  {
    echo "Error! Check Input.";
    } elseif ($_POST["grade4"] < 0 or $_POST["grade4"] >100)  {
    echo "Error! Check Input.";
    } elseif ($_POST["grade5"] < 0 or  $_POST["grade5"]>100 ) {
    echo "Error! Check Input.";
    } else {
    $grades = $grades + $_POST["grade1"] + $_POST["grade2"] + $_POST["grade3"] + $_POST["grade4"] + $_POST["grade5"];
    } 
}

?>
    
    <div class="bg-img">
      <div class="content">
        <header>Grades</header>
        <form action="" method="post">
          <div class="section">
            <span> physics </span>
            <input type="number"  placeholder="" name="grade1"/>
          </div>
          <div class="section space">
            <span>Chemistry</span>
            <input type="number"  placeholder="" name="grade2"/>
          </div>
          <div class="section space">
            <span>Biology</span>
            <input type="number"  placeholder="" name="grade3"/>
          </div>
          <div class="section space">
            <span>Mathematics</span>
            <input type="number"   placeholder="" name="grade4"/>
          </div>
          <div class="section space">
            <span>Computer</span>
            <input type="number"   placeholder="" name="grade5"/>
          </div>
          <div class="section">
            <input type="submit" value="Submit" />
          </div>

          <div class="section">
            <p><?php Grade($grades); ?></p>
            
          </div>
        </form>
      </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
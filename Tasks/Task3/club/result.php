<?php
session_start();


//print_r($_POST);
//print_r($_SESSION);

define ('CLUB_SUBSCRIPTION', 10000);
define('MEMBER_SUBSCRIPTION',2500);


function price(string $gameName) :float{
    $games = [
        'football'=>300,'swimming'=>250,'volleyball'=>150,'other'=>100
    ];
    return $games[$gameName] ?? 0;
}
$clubs = [
    'football' => 0,
    'swimming' => 0,
    'volleyball' => 0,
    'other' => 0,
];

function addMoneyToClubs(string $gameName) {
    global $clubs ;
    $clubs[$gameName] += price($gameName);
}

$total = 0;
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
    <div class="container">
        <table class="table table-dark table-striped mt-5">
            <thead>
            <tr>
                <th colspan="3">Subscriber</th>
                <th colspan="3" class="text-capitalize"><?= $_SESSION['name'] ?></th>
            </tr>
            </thead>
            <tbody>
                <?php


                foreach($_POST['members']  as  $member){ ?>
                    <tr>
                        <td><?= $member['name'] ?></td>
                        <?php
                        $subTotal = 0;
                        if(isset($member['games'])){
                            $count = count($member['games']); //3
                            foreach($member['games'] AS $game){
                                echo "<td>{$game}</td>";
                                $subTotal+= price($game);
                                addMoneyToClubs($game);
                            }
                            for($i = 1; $i <= 4-$count;$i++){
                                echo "<td></td>";
                            }
                        }else{
                            echo "<td colspan=4></td>";
                        }
                        $total += $subTotal;
                        ?>
                        <td class="text-right"><?= $subTotal ?></td>
                    </tr>
                <?php }
                $totalPrice = $total + (MEMBER_SUBSCRIPTION * count($_POST['members'])) + CLUB_SUBSCRIPTION;
                ?>
                <tr>
                    <td colspan="3">Total Games</td>
                    <td class="text-right" colspan="3"><?= $total ?> EGP</td>
                </tr>
                <tr>
                    <td colspan="3">Football Club</td>
                    <td class="text-right" colspan="3"><?= $clubs['football'] ?> EGP</td>
                </tr>
                <tr>
                    <td colspan="3">Swimming Club</td>
                    <td class="text-right" colspan="3"><?= $clubs['swimming'] ?> EGP</td>
                </tr>
                <tr>
                    <td colspan="3">Volleyball Club</td>
                    <td class="text-right" colspan="3"><?= $clubs['volleyball'] ?> EGP</td>
                </tr>
                <tr>
                    <td colspan="3">Other Club</td>
                    <td class="text-right" colspan="3"><?= $clubs['other'] ?> EGP</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-primary">Total Price</td>
                    <td class="text-right text-primary" colspan="3"><?=  $totalPrice ?> EGP</td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php include "../includes/footer.php"?>

        <?= session_destroy(); ?>

        <script src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>
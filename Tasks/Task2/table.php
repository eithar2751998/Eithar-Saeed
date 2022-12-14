<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title>Task2</title>
    </head>
    <body>
        <?php
            // dynamic table => 3 levels only
            // dynamic rows //4
            // dynamic columns // 4
            // check if gender of user == m ==> male // 1
            // check if gender of user == f ==> female // 1

            $users = [
                (object)[
                    'id' => 1,
                    'name' => 'ahmed',
                    "gender" => (object)[
                        'gender' => 'm'
                    ],
                    'hobbies' => [
                        'football', 'swimming', 'running',
                    ],
                    'activities' => [
                        "school" => 'drawing',
                        'home' => 'painting'
                    ],
//                     'phones'=>"0123123",
                ],
                (object)[
                    'id' => 2,
                    'name' => 'mohamed',
                    "gender" => (object)[
                        'gender' => 'm'
                    ],
                    'hobbies' => [
                        'swimming', 'running',
                    ],
                    'activities' => [
                        "school" => 'painting',
                        'home' => 'drawing'
                    ],
//                     'phones'=>"2345",
                ],
                (object)[
                    'id' => 3,
                    'name' => 'menna',
                    "gender" => (object)[
                        'gender' => 'f'
                    ],
                    'hobbies' => [
                        'running',
                    ],
                    'activities' => [
                        "school" => 'painting',
                        'home' => 'drawing'
                    ],
//                     'phones'=>"",
                ],

            ];
        ?>
    <div class="container mt-5">
        <table class="table table-success table-striped">
            <thead>
            <tr>
                <?php
                foreach ($users[0] as $key=>$value){
                    echo "<th class='text-uppercase text-center'>".$key."</th>";
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php

            for ($i = 0; $i < count($users); $i++){
                echo "<tr>";
                foreach ($users[$i] as $property => $value ){
                    echo "<td class='text-capitalize text-center'>";
                    if(gettype($value) == 'object' || gettype($value) == 'array'){
                        foreach ($value as $keyOrProperty => $val){
                            if($property === 'gender' && $keyOrProperty === 'gender'){
                                $val = $val == 'm' ? 'male' : 'female';
                            }
                            echo ($val). "<br>"  ;
                        }
                    }
                    else {
                            echo $value ;
                    }

                    echo "</td>";
                }

                echo"</tr> ";

            }
            ?>
            </tbody>
        </table>
    </div>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>


<?php
    define('CONSTANT', 'pp');
    $array = [123, 175, 147, 58];
    echo "\n";
    echo "<br>";
    print_r($array);

    function testFunction($boy) {
        return "{$boy['name']} is {$boy['age']}";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sample PHP file</title>
</head>

<body>
    <h2><?php
        echo 'hello, boys';
    ?>
    </h2>

    <div>e
        <?php
            echo testFunction(['name' => 'dd', 'age' => '12']);
        ?>
    </div>
    <div>
        <?php
            echo testFunction(['name' => 'dd', 'age' =>'13']);
        ?>
    </div>

</body>
</html>
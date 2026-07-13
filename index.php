<meta charset="utf-8" />
<?php
$title = "Introduction to PHP";
$definition = "PHP - Hypertext Preprocessor";
define("PI", 3.14);     #Объявляет константу на этапе выполнения;
const EPSILON = 2.7;    //Объявляет константу на этапе компиляции;
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?= $title; //Строчный комментарий ?></h1>
    <h2><?= $definition; #Строчный комментарий ?></h2>
    <?php 3.14159; ?>
    <p>Число PI = <?= PI; ?></p>
    <p>EPSILON = <?= EPSILON; ?></p>
    <h2>Типы данных PHP</h2>
    <!--<?= die("Прерывает выполнение кода") ?>-->
    <pre>
        <?php
        var_dump($title);
        var_dump(PI);
        ?>
    </pre>
</body>
</html>
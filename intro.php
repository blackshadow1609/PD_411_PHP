<meta charset="utf-8" />
<?php

use UI\Size;
$title = "Introduction to PHP";
$definition = "PHP - Hypertext Preprocessor";
const EPSILON = 2.7;    //Объявляет константу на этапе компиляции;
define("PI", 3.14);     #Объявляет константу на этапе выполнения;
const NOWSTRING = <<<'VINNY'
<pre>
Хорошо живет
на свете
Винни-Пух!
Вот и конец.
</pre>
VINNY;
function type_info($typename, $size, $min_value, $max_value)
{
    echo <<<INFO
<pre>
$typename:
Size - $size,
Range: $min_value ... $max_value;
</pre>
INFO;
    //echo "<pre>$typename: Size - $size, Range: $min_value ... $max_value; </pre>";
    //echo '<pre>';
    //echo $typename;
    //echo ': Size -';
    //echo $size;
    //echo '; Range:';
    //echo $min_value;
    //echo ' ... ';
    //echo $max_value;
    //echo ';';
    //echo '</pre>';
}
function dump_wrapper($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $title; ?></title>
</head>
<body>
    <h1><?= $title; //Строчный комментарий ?></h1>
    <details>
        <summary>Введение</summary>
        <h2><?= $definition; #Строчный комментарий ?></h2>
        <?php 3.14159; ?>
        <p>Число PI = <?= PI; ?></p>
        <p>EPSILON = <?= EPSILON; ?></p>
    </details>
    <details>
        <summary>Типы данных</summary>
        <h2>Типы данных PHP</h2>
        <pre>
            <?php
            var_dump($title);
            var_dump(PI);
            ?>
        </pre>
        <?= NOWSTRING; ?>
        <ol>
            <li>
                Скалярные типы
                <ul>
                    <li><code>bool. FALSE: "", '', array(), [], null, SimpleXML</code></li>
                    <li><code>int: <?= PHP_INT_MIN . "..." . PHP_INT_MAX ?></code></li>
                    <li><?php type_info('INT', PHP_INT_SIZE, PHP_INT_MIN, PHP_INT_MAX) ?></li>
                    <li>
                        <code>
                            int: <?php echo PHP_INT_SIZE;
                            echo 'Bytes';
                            echo PHP_INT_MIN;
                            echo '...';
                            echo PHP_INT_MAX ?>
                        </code>
                    </li>
                    <li><?php type_info('FLOAT', PHP_FLOAT_DIG, PHP_FLOAT_MIN, PHP_FLOAT_MAX) ?></li>
                    <li>
                        <code>string</code>
                        <ul>
                            <li>single quotted: <?= 'Hello PHP' ?></li>
                            <li>double quotted &#8213; поддерживает Escape-последовательности и интерполяцию строк.</li>
                            <li>heredoc syntax &#8213; RAW-строка, которая сохраняет переносы. heredoc поддерживает интерполяцию.</li>
                            <li>nowdoc quotted &#8213; RAW-строка, без интерполяции.</li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                Составные типы
                <ul>
                    <li><code>array</code></li>
                    <li><code>object</code></li>
                    <li><code>callable</code></li>
                    <li><code>iterable</code></li>
                </ul>
            </li>
            <li>
                Специальные типы
                <ul>
                    <li><code>resource</code></li>
                    <li><code>null</code></li>
                </ul>
            </li>
        </ol>
    </details>
    <details>
        <summary>Массивы</summary>
        <h2>Массивы</h2>
        <h3>Индексированные массивы:</h3>
        <?php
        $arr = array(3, 5, 8, 13, 21);
        //dump_wrapper($arr);
        print_r($arr);

        $arr2 = [3, 5, 8, 13, 21, 34, 55];
        //dump_wrapper($arr2);
        

        echo '<pre>';
        for ($i = 0; $i < count($arr2); $i++) {
            echo "$arr2[$i]\t";
        }
        echo "\n";
        $arr2[] = 89;   //Добавление элемента
        print_r($arr2);
        unset($arr2[3]);    //Удаление элемента (счет от 0)
        print_r($arr2);

        echo '</pre>';
        ?>

        <h3>Ассоциативные массивы:</h3>
        <?php
        $weekdays =
            [
                'Sunday' => 0,
                'Moonday' => 1,
                'Tuesday' => 2,
                'Wednesday' => 3,
                'Thurday' => 4,
                'Friday' => 5,
                'Saturnday' => 6
            ];
        //$weekdays['Sunday'] = 0;
        //$weekdays['Moonday'] = 1;
        //$weekdays['Tuesday'] = 2;
        //$weekdays['Wednesday'] = 3;
        //$weekdays['Thurday'] = 4;
        //$weekdays['Friday'] = 5;
        //$weekdays['Saturnday'] = 6;
        echo '<pre>';
        foreach ($weekdays as $day => $value) {
            echo "$day\t\t";
        }
        echo "\n";
        print_r($weekdays);
        echo '</pre>';
        echo $weekdays['Wednesday'];
        ?>
        <h3>Многомерные массивы:</h3>
        <?php
        $multi_array =
            [
                [0, 1, 1, 2],
                [3, 5, 8, 13, 21],
                [34, 55, 89],
                [144, 233, 377, 610]
            ];
        echo '<hr>';
        echo '<pre>';
        for($i=0; $i < count($multi_array); $i++)
        {
            for($j=0; $j < count($multi_array[$i]); $j++)
            {
                echo $multi_array[$i][$j], "\t\t";
            }
            echo "\n";
        }
        echo '<hr>';
        foreach($multi_array as $row)
        {
            foreach($row as $element)
            {
                echo "$element\t\t";
            }
            echo "\n";
        }
        echo '<hr>';
        print_r($multi_array);
        echo '</pre>';
        ?>
    </details>
</body>
</html>
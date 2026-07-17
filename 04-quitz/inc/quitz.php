<?php
require_once __DIR__ . '/header.php';

// Проверка
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['first_name']) && isset($_POST['last_name'])) {
    echo "Привет, {$_POST['first_name']} {$_POST['last_name']}, приятного прохождения!";
    echo '<pre>';
    print_r(ROOT . "\n");
    echo $_SERVER['DOCUMENT_ROOT'];
    echo '</pre>';
}
?>

<form action="" method="post">
    <div class="quitz-content">
        <?php for ($i = 0; $i < count($questions); $i++): ?>
            <div class="question">
                <h3><?= $questions[$i] ?></h3>
                <?php for ($j = 0; $j < count($answers[$i]); $j++): ?>
                    <input type="radio" name="question_<?= $i ?>" id="<?= "{$i}_{$j}" ?>" value="<?= $j ?>" />
                    <label for="<?= "{$i}_{$j}" ?>"><?= $answers[$i][$j] ?></label>; <br />
                <?php endfor ?>
            </div>
        <?php endfor ?>
    </div>
    
    <div class="submit-button">
        <input type="submit" value="Отправить" />
    </div>
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['question_0'])) {
    $correct_count = 0;
    $wrong_count = 0;

    for ($i = 0; $i < count($questions); $i++) {
        if (isset($_POST["question_$i"])) {
            $user_answer = (int) $_POST["question_$i"];
            if ($user_answer === $correct_answers[$i]) {
                $correct_count++;
            } else {
                $wrong_count++;
            }
        } else {
            $wrong_count++; 
        }
    }

    echo '<div class="results">';
    echo "<p>Правильных ответов: $correct_count</p>";
    echo "<p>Неправильных ответов: $wrong_count</p>";
    echo '</div>';
}

require_once __DIR__ . '/footer.php';
?>
<?php
/*echo '<pre>';
print_r($_POST);
echo '</pre>';*/

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/header.php';

$asked_questions = array_keys($_POST);
$user_answers = array_values($_POST);
$score = 0;

for ($i = 0; $i < count($user_answers); $i++) {
    #$answer = explode('_', $user_answers[$i])[1];
    $answer = $user_answers[$i][strlen($user_answers[$i])-1];
    #$answer = $user_answers[$i][count($user_answers)-1];
    #echo $answer;
    if ($answer == $correct_answers[$i])
        $score++;
}

$score_message = "Количество правильных ответов: {$score}.";
$receipient = 'blackshadow1609@yandex.ru';
$sender = 'PHPtest@PD411.academy';

$headers[] = "MIME-Version 1.0:\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
//$headers .= "To: {$receipient}\r\n";
$headers .= "From: {$sender}\r\n";


echo '<div class="result">';
echo $score_message;
echo mail($receipient, 'Результаты тестирования', $score_message, $headers);

echo '</div>';
require_once __DIR__ . '/footer.php';
?>

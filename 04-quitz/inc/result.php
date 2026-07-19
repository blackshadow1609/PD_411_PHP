<?php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/header.php';

$possiblePaths = [
    'F:/Users/Alina/source/repos/PD_411_PHP/PHPMailer/src/PHPMailer.php',
    __DIR__ . '/../../PHPMailer/src/PHPMailer.php',
    __DIR__ . '/../PHPMailer/src/PHPMailer.php',
    __DIR__ . '/PHPMailer/src/PHPMailer.php',
];

$found = false;
foreach ($possiblePaths as $path) {
    if (file_exists($path)) {
        $baseDir = dirname($path);
        require_once $baseDir . '/PHPMailer.php';
        require_once $baseDir . '/SMTP.php';
        require_once $baseDir . '/Exception.php';
        $found = true;
        break;
    }
}

if (!$found) {
    die('PHPMailer не найден! Проверьте путь к библиотеке.');
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$asked_questions = array_keys($_POST);
$user_answers = array_values($_POST);
$score = 0;

$correct_answers = [];
for ($i = 0; $i < count($questions); $i++) {
    $correct_answers[] = $i;
}

for ($i = 0; $i < count($user_answers); $i++) {
    $answer_parts = explode('_', $user_answers[$i]);
    $answer_index = (int) end($answer_parts);

    if ($answer_index == $i)
        $score++;
}

$score_message = "Количество правильных ответов: {$score} из " . count($questions);

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->isSMTP();
    $mail->Host = 'smtp.yandex.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'blackshadow1609@yandex.ru';
    $mail->Password = 'vrjdjxudayavwabu'; // Пароль приложения
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('blackshadow1609@yandex.ru', 'PHP Test');
    $mail->addAddress('www.blackshadow16@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Результаты тестирования';
    $mail->Body = $score_message;
    $mail->AltBody = $score_message;

    $mail->send();
    echo '<div class="result">';
    echo $score_message;
    echo '<br> Письмо успешно отправлено!';
    echo '</div>';
} catch (Exception $e) {
    echo '<div class="result">';
    echo $score_message;
    echo '<br> Письмо не отправлено. Ошибка: ' . $mail->ErrorInfo;
    echo '</div>';
}

require_once __DIR__ . '/footer.php';
?>
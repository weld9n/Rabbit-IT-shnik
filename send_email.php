<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка, если все необходимые данные переданы в форме
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Если все поля заполнены
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Подключаем библиотеку PHPMailer
        require 'PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Используйте ваш SMTP сервер
        $mail->SMTPAuth = true;
        $mail->Username = 'it.rabbit.it@gmail.com'; // Ваш email
        $mail->Password = 'kakamakaka03'; // Ваш пароль для почты
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Настройки отправителя и получателя
        $mail->setFrom('your-email@example.com', 'Rabbit Programming Course');
        $mail->addAddress('your-email@example.com'); // Ваш email

        // Тема письма
        $mail->Subject = 'Заявка с сайта Rabbit Programming Course';

        // Тело письма
        $mail->Body = "Имя: $name\nEmail: $email\nСообщение:\n$message";

        // Отправка письма
        if ($mail->send()) {
            echo 'Заявка успешно отправлена.';
        } else {
            echo 'Ошибка при отправке заявки: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'Пожалуйста, заполните все поля.';
    }
} else {
    echo 'Некорректный запрос.';
}
?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = htmlspecialchars(trim($_POST['email']));
        $name = htmlspecialchars(trim($_POST['name']));
        $surname = htmlspecialchars(trim($_POST['surname']));
        $fathername = htmlspecialchars(trim($_POST['fathername']));
        $phone_number = htmlspecialchars(trim($_POST['phone_number']));
        $phone_number2 = htmlspecialchars(trim($_POST['phone_number2']));
    
        if (empty($name) || empty($email) || empty($surname) || empty($phone_number)) {
            echo "Все поля обязательны для заполнения.";
            exit;
        }
        else{
            echo "Ты молодец";
            exit;
        }
    
        $to = $email;
        $subject = "Новое сообщение с сайта";
        $message = "Имя: $name\nEmail: $email";
        $headers = "From: {$email}";
    
        if (mail($to, $subject, $message, $headers)) {
            echo "Сообщение успешно отправлено!";
        } else {
            echo "Ошибка при отправке сообщения.";
        }
    }

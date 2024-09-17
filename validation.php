<?php
    $response = ['success' => 'false', 'errors' => []];

    $email = $_POST['email'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $name = $_POST['name'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['errors']['email'] = 'Введите корректный email';
    }

    if (empty($phone_number) || strlen($phone_number) < 11 || strlen($phone_number) > 12) {
        $response['errors']['phone_number'] = 'Введите корректный номер телефона';
    }

    if (empty($surname)) {
        $response['errors']['surname'] = 'Это обязательное поле';
    }

    if (empty($name)) {
        $response['errors']['name'] = 'Это обязательное поле';
    }

    // Если нет ошибок, отправляем письмо
    if (empty($response['errors'])) {
        $to = "your-email@example.com";
        $subject = "Новая заявка с формы";
        $message = "Email: $email\nТелефон: $phone_number\nФамилия: $surname\nИмя: $name";

    if (mail($to, $subject, $message)) {
            $response['success'] = 'true';
        }
    }

    echo json_encode($response);
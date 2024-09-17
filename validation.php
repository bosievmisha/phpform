<?php
    $response = ['success' => 'false', 'errors' => []];

    $email = $_POST['email'] ?? '';
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Здесь можно добавить код для отправки письма
    
        $to = "your-email@example.com";
        $subject = "Новая заявка с формы";
        $message = "Email: $email";
        
        if (mail($to, $subject, $message)) {
            $response['success'] = 'true';
        }
    } else {
        $response['errors']['email'] = 'Это обязательное поле';
    }
    
    echo json_encode($response);

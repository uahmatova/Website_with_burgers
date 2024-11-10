<?php
header('Content-Type: application/json'); // Устанавливаем заголовок для JSON

include('db.php');

// Проверяем, был ли запрос методом POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем данные из массива $_POST
    $burger = $_POST['burger'] ?? '';
    $name = $_POST['name'] ?? ''; // Используем оператор нулевого слияния
    $phone = $_POST['phone'] ?? '';
    
    echo json_encode($response); // Возвращаем ответ в формате JSON
} else {
    // Если метод не POST, возвращаем ошибку
    echo json_encode(['success' => false, 'message' => 'Неверный запрос.']);
}

    $post = [
        'burger' => $burger,
        'name' => $name,
        'phone' => $phone
    ];  

    tt($post);
?>

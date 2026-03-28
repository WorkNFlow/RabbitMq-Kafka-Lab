<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №7 - RabbitMQ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .students-list {
            margin-top: 30px;
        }
        .student-item {
            background: #f8f9fa;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border-left: 4px solid #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐇 Лабораторная работа №7 - RabbitMQ</h1>
        
        <form action="send.php" method="post">
            <div class="form-group">
                <label for="name">Введите имя:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <button type="submit">Отправить в очередь</button>
        </form>

        <?php
        if (file_exists('processed_rabbit.log')) {
            $messages = array_reverse(file('processed_rabbit.log', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
            if (!empty($messages)) {
                echo '<div class="students-list">';
                echo '<h2>📋 Обработанные сообщения:</h2>';
                foreach ($messages as $message) {
                    $data = json_decode($message, true);
                    if ($data) {
                        echo '<div class="student-item">';
                        echo '<strong>Имя:</strong> ' . htmlspecialchars($data['name']) . '<br>';
                        echo '<strong>Время:</strong> ' . htmlspecialchars($data['timestamp']);
                        echo '</div>';
                    }
                }
                echo '</div>';
            }
        }
        ?>
    </div>
</body>
</html>

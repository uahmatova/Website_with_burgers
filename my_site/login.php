<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="styles/login.css"> 
</head>

<body>
    <h2 style = "margin-right: 50px">
        Вход в административную панель
    </h2>

    <form action="admin.php" method="POST">
        <input type="text" name = "loginn" class="form-input" placeholder="Введите логин">
        <input type="password" name = "pass" class="form-input" placeholder="Введите пароль"> 
        <button type="submit" class="button">войти</button>
    </form>
</body>
</html>

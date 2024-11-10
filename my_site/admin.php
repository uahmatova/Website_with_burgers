<?php session_start(); ?>
<?php
    require('app/connect.php');     //подключение к бд

    //данные с формы 
    $loginn = $_POST["loginn"];
    $pass = $_POST["pass"];


    $sql = $pdo->prepare("SELECT id, loginn FROM users WHERE loginn = :loginn AND pass = :pass");
    $sql->execute(array('loginn' => $loginn, 'pass' => $pass));
    $array = $sql->fetch(PDO::FETCH_ASSOC);
    //print_r($array);
    
    if($array["id"]>0)  //если есть айдишник с таким логином и паролем в бд
    {
        //записываем сессию
        $_SESSION['loginn']=$array["loginn"];   //вытаскиваем из бд логин
        //переводим админку на другую страницу
        header('location: http://localhost/phpmyadmin/index.php?route=/database/structure&db=db_burgers');
    }
    else {
        echo '<script type="text/javascript">';
        echo 'alert("' . addslashes("Некорректный логин и/или пароль. Попробуйте ещё раз") . '");';
        echo '</script>';
        header('location: login.php');
    }


?>
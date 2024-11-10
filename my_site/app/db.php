<?php
    require('connect.php');     //подключение к бд

    //функция красивого вывода данных из таблицы
    function tt($value){
        echo '<pre>';
        print_r($value);
        echo '<pre>';
    }

    //проверка выполнения запроса к бд
    function checkError($query){
        $errInfo = $query->errorInfo();
        if($errInfo[0] !== PDO::ERR_NONE){
            echo $errInfo[2];
            exit();
        }
        return true;
    }


    //получение всех данных в таблице
    function selectAll($table){
        global $pdo; 
        $sql = "SELECT * FROM $table"; 

        //подготовка
        $query = $pdo->prepare($sql);
        $query->execute();

        checkError($query);

         //фетч только для выбора одной строки
        return $query->fetchAll();    
    }

    //вывод
    //var_dump($data);
    //tt(selectAll("orders"));


    function insert($table, $params){
        global $pdo; 

        $i = 0;
        $col = '';
        $mask = '';

        //разбираем массив как ключ:значение
        foreach($params as $key => $value){
            if($i === 0){
                $col = $col . "$key";
                $mask = $mask ."'" ."$value" . "'";
            }
            else{
                $col = $col . ", $key";
                $mask = $mask .", '" ."$value"."'";
            }
            $i++;
        }

        $sql = "INSERT INTO $table ($col) VALUES ($mask)";

        //tt($sql);
        //exit();
        
        $query = $pdo->prepare($sql);
        $query->execute();
        checkError($query);
    }

    $arrData = [
        'menu' => 'меню1',
        'name' => 'имя1',
        'phone' => 'телефон1'
    ];

    //insert('orders', $arrData);

?>
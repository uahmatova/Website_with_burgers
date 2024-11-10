<?php
    include('db.php');

    if(isset($_POST['order-action'])){
        $burger = $_POST['burger_order'];
        $name = $_POST['name_order']; // Используем оператор нулевого слияния
        $phone = $_POST['phone_order'];

        $post = [
            'menu' => $burger,
            'name' => $name,
            'phone' => $phone
        ];

        //tt($post);
        echo '<script type="text/javascript">';
        echo 'alert("' . addslashes("Спасибо за заказ! Скоро с вами свяжется наш менеджер.") . '");';
        echo '</script>';
        insert('orders', $post);     
    }
?>
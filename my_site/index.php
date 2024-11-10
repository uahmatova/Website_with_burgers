<?php
    include('app/order.php');
    $sql = $pdo->prepare("SELECT * FROM news");
    $sql->execute();
    $for_news = $sql->fetch(PDO::FETCH_ASSOC);

    $sql2 = $pdo->prepare("SELECT * FROM catalog");
    $sql2->execute();
    $for_catalog = $sql2->fetchAll(PDO::FETCH_ASSOC);
    // print_r($for_catalog);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Burgers house</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<section class="main">

    <! по сути это div, но назван по-другому -->
    <header class="header">
        <div class="container">
            <! тут будем создавать контент внутри контейнера -->
            <a class="logo" href="login.php">
                <img src="images/Logo.png" alt="логотип">
            </a>
            <nav class="menu">
                <ul class="menu-list">
                    <li class="menu-item">
                        <a data-link = "why">Почему у нас</a>
                    </li>
                    <li class="menu-item">
                        <a data-link = "products">Меню бургерное</a>
                    </li>
                    <li class="menu-item">
                        <a data-link = "order">Оформление заказа</a>
                    </li>
                </ul>
            </nav>
            <div class="currency" title="Изменить валюту" id="change-money">$</div>
        </div>
    </header>


    <! блок для контента -->
    <section class="main-content">
        <div class="container">
            <div class="main-info">
                <span class="main-small-info">Новое меню</span>
                <h1 class="main-title"> <?php echo $for_news["title_name"]; ?> </h1>
                <p class="main-text"> <?php echo $for_news["description"]; ?> </p>
                <div class="main-action">
                    <button class="button" id="main-action-button">Cмотреть меню</button>
                    <! id для кнопки, чтоб использовать потом в  js -->
                </div>
            </div>
            <img src = " <?php echo $for_news["image"]; ?> " alt="картинка бургера" class="main-img">
        </div>
    </section>

    <section class="why" id="why">
        <div class="container">
            <div class="common-title">Почему нас выбирают?</div>
            <div class="why-items">
                <div class="why-item">
                    <img src="images/burger%20(1).png" alt="Бургер" class="why-item-img">
                    <div class="why-item-title">Авторские рецепты</div>
                    <div class="why-item-text">Наши бургеры обладают уникальным сочетанием вкусов и не похожи
                        ни на какие другие. Мы тщательно отбираем лучшие ингредиенты и сочетания вкусов для нашего меню.
                    </div>
                </div>
                <div class="why-item">
                    <img src="images/meat%20(1).png" alt="мясо" class="why-item-img">
                    <div class="why-item-title">Мраморная говядина</div>
                    <div class="why-item-text">Для наших бургеров мы используем отборную 100% мраморную говядину,
                        которую закупаем исключительно у фермеров. Мы уверены в качестве нашего мяса.
                    </div>
                </div>
                <div class="why-item">
                    <img src="images/food%20truck%20(1).png" alt="food" class="why-item-img">
                    <div class="why-item-title">Быстрая доставка</div>
                    <div class="why-item-text">Мы доставляем в пределах МКАД за 30 минут, а если не успеем — доставка
                        бесплатно. Мы тщательно упаковываем наши бургеры, чтобы по дороге они не остыли.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="products" id = "products">
        <div class="container">
            <div class="common-title">Выберите свой бургер</div>
            <div class="products-items">

                <!-- открыли цикл -->
                <?php foreach ($for_catalog as $catalog): ?>

                <div class="products-item">
                    <div class="products-item-img">
                        <img src=" <?php echo $catalog['image']; ?> " alt="картинка бургера">
                    </div>
                    <div class="products-item-title">
                        <?php echo $catalog["name"]; ?>
                    </div>
                    <div class="products-item-text">
                        <?php echo $catalog["description"]; ?>
                    </div>
                    <div class="products-item-extra">
                        <div class="products-item-info">
                            <! сохраняем базовую валюту -->
                            <div class="products-item-price" data-base-price="8"> 
                                <?php echo $catalog["price"]; ?> $
                            </div>
                            <div class="products-item-weight">
                                <?php echo $catalog["gramm"]; ?>
                            </div>
                        </div>
                        <div class="products-item-action">
                            <button class="button product-button">
                                <span>Заказать</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                         fill="none">
                                      <path d="M17 18.5C17.5304 18.5 18.0391 18.7107 18.4142 19.0858C18.7893 19.4609 19 19.9696 19 20.5C19 21.0304 18.7893 21.5391 18.4142 21.9142C18.0391 22.2893 17.5304 22.5 17 22.5C16.4696 22.5 15.9609 22.2893 15.5858 21.9142C15.2107 21.5391 15 21.0304 15 20.5C15 19.39 15.89 18.5 17 18.5ZM1 2.5H4.27L5.21 4.5H20C20.2652 4.5 20.5196 4.60536 20.7071 4.79289C20.8946 4.98043 21 5.23478 21 5.5C21 5.67 20.95 5.84 20.88 6L17.3 12.47C16.96 13.08 16.3 13.5 15.55 13.5H8.1L7.2 15.13L7.17 15.25C7.17 15.3163 7.19634 15.3799 7.24322 15.4268C7.29011 15.4737 7.3537 15.5 7.42 15.5H19V17.5H7C6.46957 17.5 5.96086 17.2893 5.58579 16.9142C5.21071 16.5391 5 16.0304 5 15.5C5 15.15 5.09 14.82 5.24 14.54L6.6 12.09L3 4.5H1V2.5ZM7 18.5C7.53043 18.5 8.03914 18.7107 8.41421 19.0858C8.78929 19.4609 9 19.9696 9 20.5C9 21.0304 8.78929 21.5391 8.41421 21.9142C8.03914 22.2893 7.53043 22.5 7 22.5C6.46957 22.5 5.96086 22.2893 5.58579 21.9142C5.21071 21.5391 5 21.0304 5 20.5C5 19.39 5.89 18.5 7 18.5ZM16 11.5L18.78 6.5H6.14L8.5 11.5H16Z"
                                            fill="#191411"/>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
                <!-- закрыли цикл -->

            </div>
        </div>
    </section>

    <section class="order" id = "order">
        <div class="container">
            <div class="order-title common-title">Оформление заказа</div>
                <img src="images/order_image.png" alt="заказ" class="order-img">
                <div class="order-form">


                    <div class="order-form-text">Заполните все данные и наш менеджер свяжется с вами для подтверждения
                        заказа
                    </div>        
                    
                    <form action="index.php" method="post" class="order-form-inputs">
                        <div class="order-form-input">
                            <input name = "burger_order" type="text" placeholder="Ваш заказ" id="burger" required>
                        </div>
                        <div class="order-form-input">
                            <input name = "name_order" type="text" placeholder="Ваше имя" id = "name" required>
                        </div>
                        <div class="order-form-input">
                            <input name = "phone_order" type="text" placeholder="Ваш телефон" id = "phone" required>
                        </div>
                       <button type = "submit" class = "button" id = "order-action" name = "order-action">Оформить заказ</button>
                    </form>
                </div>
        </div>
    </section>

    <footer class = "footer">
        <div class="container">
            <div class="logo">
                <img src="images/Logo.png" alt="логотип">
            </div>
            <div class="rigths">Все права защищены</div>
        </div>
    </footer>

</section>

<script src="scripts/script.js"></script>

</body>
</html>
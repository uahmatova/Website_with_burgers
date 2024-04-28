//document.getElementsByClassName("main-title")[0].style.color = "red";
//обращение к текущему документу, получение всех элементов по определенному классу, первый элемент

//нажатие на кнопку + вывод на экран
//обработка событий
document.getElementById("main-action-button").onclick = function()
{
    //перевод к соответствующему блоку
    //метод перевода + в скобках параметр плавного перевода
    document.getElementById("products").scrollIntoView({behavior:"smooth"});
}

//размещаем все ссылки
let links = document.querySelectorAll(".menu-item > a");
//проходимся по всем ссылкам
for(let i = 0; i < links.length; i++)
{
   links[i].onclick = function ()
   {
       document.getElementById(links[i].getAttribute("data-link")).scrollIntoView({behavior:"smooth"});
   }
}

let buttons = document.getElementsByClassName("product-button")
for(let i = 0; i < buttons.length; i++)
{
    buttons[i].onclick = function ()
    {
        document.getElementById("order").scrollIntoView({behavior:"smooth"});
    }
}

//валидация
let burger = document.getElementById("burger");
let name =  document.getElementById("name");
let phone = document.getElementById("phone");
document.getElementById("order-action").onclick = function()
{
    let hasError = false;
    [burger, name, phone].forEach(item =>
    {
        if(!item.value)     //если хоть одна ячеейка не заполнена
        {
            item.parentElement.style.background = "red"; //ошибка
            hasError = true;
        }
        else
        {
            item.parentElement.style.background = "";
        }
    });

    //обработка данных, если всё оки
    if(!hasError)
    {
        //очищаем форму
        [burger, name, phone].forEach(item =>
        {
            item.value = "";
        });
        alert("Спасибо за заказ! Скоро с вами свяжется наш менеджер.");
    }
}

//изменение курса валют
//ищем все блоки с ценами
let prices = document.getElementsByClassName("products-item-price");

document.getElementById("change-money").onclick = function (e)
{
    //запоминаем, что вообще за валюта сейчас
    let currentCurrency = e.target.innerText;
    let newCurrency = "$";

    //коэфф-т для перевода
    let coefficient = 1;

    if(currentCurrency === "$")
    {
        newCurrency = "₽";
        coefficient = 83;
    }
    else if (currentCurrency === "₽")
    {
        newCurrency = "BYN";
        coefficient = 3;
    }
    else if (currentCurrency === 'BYN') {
        newCurrency = '€';
        coefficient = 0.9;
    }
    else if (currentCurrency === '€') {
        newCurrency = '¥';
        coefficient = 6.9;
    }

    e.target.innerText = newCurrency;
    //ищем все элементы
    //меняем валюту
    for(let i = 0; i < prices.length; i ++)
    {
        //"+" - для того, чтобы преобразовать в число
        prices[i].innerText = +(prices[i].getAttribute("data-base-price") * coefficient).toFixed(1) + " " + newCurrency;
    }
}
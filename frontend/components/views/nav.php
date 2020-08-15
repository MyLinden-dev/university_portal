<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;

?>
<header class="header">
    <div class="header-top">
        <div class="container p-0 d-flex">
            <div class="header-name">
                Донецкий Национальный<br/>Технический Университет
            </div>
            <div class="header-social ml-auto">
                <ul>
                    <li class="social-item"><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li class="social-item"><a href=""><i class="fab fa-facebook"></i></a></li>
                    <li class="social-item"><a href=""><i class="fab fa-vk"></i></a></li>
                    <li class="social-item"><a href=""><i class="fab fa-odnoklassniki"></i></a></li>
                    <li class="social-item"><a href=""><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="header-menu px-5">
        <a href="<?= Url::home() ?>" class="brand"><img src="/img/icons/logo.png" alt=""></a>
        <ul class="list-inline">
            <li class="list-inline-item list-inline-item--why" >
                <a href="" class="mt-2">
                    <h2>ПОЧЕМУ ДОННТУ?</h2>
                    <h3>Ознакомься перед поступлением</h3>
                </a></li>
            <li class="list-inline-item list-inline-item--goz">
                <a href="" class="mt-2">
                    <h2>ГОС.ЗАКАЗ </h2>
                    <h3>Контрольные цифры приёмов</h3>
                </a>
            </li>
            <li class="list-inline-item list-inline-item--ask">
                <a href="#" data-toggle="modal" data-target="#sendQuestion">
                    <h2>ЗАДАТЬ ВОПРОС</h2></a></li>
            <li class="list-inline-item list-inline-item--profile"><a href=""><h2>ЛИЧНЫЙ КАБИНЕТ</h2></a></li>
        </ul>
    </div>
</header>
<nav class="navbar navbar-expand-sm">
    <div class="container p-0">
        <ul class="navbar-nav justify-content-around justify-content-lg-between">
            <li class="nav-item"><a href="<?= Url::home() ?>" class="nav-link">главная</a></li>
            <li class="nav-item"><a href="<?= Url::toRoute(['news/index']) ?>" class="nav-link">новости</a></li>
            <li class="nav-item"><a href="" class="nav-link">правила&nbspприёма</a></li>
            <li class="nav-item"><a href="" class="nav-link">приказы&nbspи&nbspсписки</a></li>
            <li class="nav-item"><a href="" class="nav-link">документы</a></li>
            <li class="nav-item"><a href="" class="nav-link">контакты</a></li>

        </ul>
    </div>
</nav>

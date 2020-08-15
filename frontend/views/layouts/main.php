<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use app\components\SliderWidget;
use app\components\NavbarWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?= NavbarWidget::widget() ?>
    <?= SliderWidget::widget() ?>

    <div class="container p-0">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <ul class="d-flex justify-content-between">
            <li>
                <a href="">Адрес приемной комисии</a>
                <a href="">Важная информация</a>
                <a href="">Центр довузовской подготовки</a>
                <a href="">Карта корпусов общежитий</a>
            </li>
            <li>
                <p><i class="fa fa-envelope"></i><span>donntu.info@mail.ru</span></p>
                <p><i class="fa fa-phone "></i><span>+38&nbsp(062)&nbsp301-07-09 справка<br>+38&nbsp(062)&nbsp301-08-89 приемная&nbspкомиссия</span></p>
            </li>
            <li>
                <p><i class="fa fa-map-marker-alt"></i><span>г.Донецк,&nbspул.Артема,&nbsp58<br>1&nbspкорпус&nbspДонНТУ</span></p>
            </li>
            <li class="footer-social align-items-stretch">
                <p class="text-center pb-3"><img src="/img/icons/logo-footer.png" alt=""></p>
                <!--<p class="text-center pb-3"><img src="/images/VK-logo.png" alt=""></p>
-->
                <ul class="p-0">
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-facebook"></i></a></li>
                    <li><a href=""><i class="fab fa-vk"></i></a></li>
                    <li><a href=""><i class="fab fa-odnoklassniki"></i></a></li>
                    <li><a href=""><i class="fab fa-youtube"></i></a></li>
                </ul>
            </li>
        </ul>
    </div>
</footer>
<div class="modal fade" id="sendQuestion">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Задать вопрос</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="email">E-mail*</label>
                        <input id="email" name="email" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fio">ФИО*</label>
                        <input id="fio" name="fio" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Номер телефона</label>
                        <input id="phone" name="phone" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Тема вопроса</label>
                        <select class="form-control" id="category" name="category">
                            <option value="">Не могу поступить</option>
                            <option value="">Не могу поступить</option>
                            <option value="">Не могу поступить</option>
                            <option value="">Не могу поступить</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question">Тема вопроса</label>
                        <textarea id="question" name="question" class="form-control" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Прикрепить файл</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image">
                            <label for="image" class="custom-file-label">Прикрепить файл</label>
                        </div>
                        <small class="form-text text-muted">Максимальный размер 3 мб</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal">Отправить</button>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?> -->
</body>

</html>
<?php $this->endPage() ?>

<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>


<div class="site-index">

    <div class="jumbotron">
        <h1>Административная панель</h1>
        <p class="lead"> Выберите один из разделов для его просмотра и/или изменения.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Новости</h2>

                <p>Новости и события.</p>

                <p><a class="btn btn-success" href="/admin/ncategory/index">Категории</a></p>
                <p><a class="btn btn-success" href="/admin/nnews/index">Новости</a></p>
                <p><a class="btn btn-default" href="/admin/cevent/index">События</a></p>
                <p><a class="btn btn-default" href="/admin/ceventdate/index">Даты событий</a></p>

            </div>
            <div class="col-lg-4">
                <h2>Обратная связь</h2>

                <p>Письма от абитуриентов и их родителей.</p>

                <p><a class="btn btn-success" href="/admin/qquestion/index">Вопросы пользователей</a></p>
                <p><a class="btn btn-success" href="/admin/qquestionimage/index">Все изображения из вопросов пользователей</a></p>
            
            </div>
            <div class="col-lg-4">
                <h2>Другое</h2>

                <p><a class="btn btn-success" href="/admin/nstatistic/index">Статитстика университета (на главной странице)</a></p>
                <p><a class="btn btn-default" href="/admin/cdateimage/index">Изображения дат в календаре</a></p>
                <p><a class="btn btn-default" href="/admin/nheaderlink/index">Ссылки в шапке (над слайдером)</a></p>

                <hr/>

                <p><a class="btn btn-default" href="/admin/nsection/index">Все разделы новостей</a></p>
                <p><a class="btn btn-default" href="/admin/nsectionimage/index">Все изображения разделов новостей</a></p>
                <p><a class="btn btn-default" href="/admin/nsectionlink/index">Все ссылки разделов новостей</a></p>
                
                <hr/>
                
                <p><a class="btn btn-default" href="/admin/nfile/index">Все файлы</a></p>
                <p><a class="btn btn-default" href="/admin/nimage/index">Все изображения</a></p>
                <p><a class="btn btn-default" href="/admin/nlink/index">Все ссылки</a></p>
            </div>

        </div>

    </div>
</div>

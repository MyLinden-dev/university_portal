<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

?>
<div class="slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php foreach ($sliders as $slider) { ?>
               <!-- <div class="swiper-slide" style="background-image: url('<?= Html::encode($slider['img']) ?>')" > -->
                <div class="swiper-slide" style="background-image: url('/img/slide-img.png')" >
                    <div class="slide-title" >
                        <div class="event-info container  p-0">
                            <h2 class="event-title"> <?= Html::encode($slider['title']) ?> </h2>
                            <p class="row m-0">
                                <span class="event-date col p-0"><?= Html::encode($slider['date_from']) ?></span>
                                <span class="event-details col"><?= Html::encode($slider['slider_annotation']) ?></span>
                            </p>
                            <a href="<?= Html::encode($slider['href']) ?>" class="event-ref btn">Подробности</a>
                        </div>
                    </div>
                </div>
            <?php } /* endforeach sliders  */ ?>
        </div>
    </div>
    <div class="slider-footer container">
        <div class="swiper-pagination"></div>
        <div class="statistics">
            <ul>
                <?php foreach($statistics as $stat) { ?>
                    <li>
                        <h3><?= Html::encode($stat['number']) ?></h3>
                        <h4><?= Html::encode($stat['title']) ?></h4>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
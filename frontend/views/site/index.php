<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Главная';
?>

<div id="main">
    <div class="row mx-0">
        <div class="col pr-3">
            <div class="content">
                <div class="heading-title"><?= Html::encode($this->title) ?></div>
                <div class="main">
                    <?php foreach ($newsList as $news) { ?>
                        <?php foreach ($news['sections'] as $section) { ?>
                            <div class="news-item clearfix">
                                <h2 class="news-item-header">
                                    <span class=""><?= Html::encode($news['title']) ?></span>
                                    <span class="date"><?php echo Html::encode($news['date_from']) ;?></span>
                                </h2>
                                <div class="news-item-img">


                                    <?php if(!empty($section['images'])) { ?>
                                        <img src="/img/<?= Html::encode($section['images'][0]['path_image']) ?>" class="img-fluid" alt="">
                                    <?php } /* endif */?>
                                </div>
                                <p class="news-item-text"><?= Html::encode($section['text']) ?></p>
                            </div>
                        <?php } /* endforeach section*/  ?>
                    <?php } /* endforeach news */?>
                </div>
            </div>

        </div>
        <div class="col pl-3">
            <?php echo $this->render($column_right) ?>
        </div>
    </div>
</div>
<style>
    .main{
        padding: 0;
    }
</style>




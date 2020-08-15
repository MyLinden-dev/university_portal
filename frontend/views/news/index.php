<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Новости';
?>
<div class="content">
    <div class="heading-title"><?= Html::encode($this->title) ?></div>
    <div class="main">

        <div id="news">

            <?php foreach ($newsList as $news) { ?>
                <?php foreach ($news['sections'] as $section) { ?>
                    <div class="news-item clearfix">
                        <div>
                            <h2 class="news-item-header"><a href="<?= Url::toRoute(['/news/' . Html::encode($news['id_news'])]) ?>"><?= Html::encode($news['title']) ?></a></h2>
                            <div class="row mx-0">
                                <div class="col px-0">
                                    <div class="news-item-dates">
                                        <div class="dates">
                                            <?php echo Html::encode($news['date_from']) ;?>
                                        </div>

                                        <?php if(!empty($section['images'])) { ?>
                                            <img src="/img/<?= Html::encode($section['images'][0]['path_image']) ?>" class="img-fluid" alt="">
                                        <?php } /* endif */?>
                                    </div>
                                </div>
                                <div class="col-7 px-0">
                                    <p class="news-item-text"><?= Html::encode($section['text']) ?></p>
                                </div>
                                <a class="col-12 text-right btn_more" href="<?= Url::toRoute(['site/news', 'id' => Html::encode($news['id_news'])]) ?>">Подробнее</a>
                            </div>

                        </div>
                     </div>
                <?php } /* endforeach section*/  ?>
            <?php } /* endforeach news */?>

        </div>
    </div>
</div>

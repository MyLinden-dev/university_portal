<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = $news['title'];
?>
<div class="content">
    <div class="heading-title"><?= Html::encode($this->title) ?></div>
    <div class="main">
        <div id="news-item-expand">
            <h2 class="news-item-header"><?= Html::encode($news['title']) ?></h2>
            <div class="news-content"><?= $news['text'] ?></div>
            <div class="news-item-sections">
                <?php if(isset($news['sections']) && !empty($news['sections'])) { ?>
                    <?php foreach ($news['sections'] as $section) { ?>
                        <div class="section">
                            <?php $class = ''; ?>
                            <?php if($section['is_hidden'] == true) { $class = 'toggle-block'; }?>
                            <h2><?= $section['title'] ?></h2>
                            <div class="section-content <?= $class ?>"><?= $section['text'] ?></div>
                        </div>
                    <?php } /* endif */ ?>
                <?php } /* endforeach */?>
            </div>

        </div>
    </div>
</div>

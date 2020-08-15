<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Календарь';
?>
<div class="content">
    <div class="heading-title"><?= Html::encode($this->title) ?></div>
    <div class="main">

        <div id="cal">
            <div class="cal-header d-flex justify-content-between">
                <div class="d-flex">

                    <button class="cal-btn" data-calendar-toggle="previous">
                        <svg height="24" version="1.1" viewbox="0 0 32 32" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" d="M24,32C8,16,8,16,8,16L24,0"/>
                            <path fill="none" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" d="M20,28"/>
                        </svg>
                    </button>

                    <div class="cal-header__label d-flex flex-column align-items-start" >
                        <span data-calendar-label="year"></span><span data-calendar-label="month"></span>
                    </div>
                    <button class="cal-btn" data-calendar-toggle="next">
                        <svg height="24" version="1.1" viewbox="0 0 32 32" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path fill="none" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" d="M8,32c16-16,16-16,16-16L8,0"/>
                            <path fill="none" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" d="M12,32"/>
                        </svg>
                    </button>
                </div>
                <div>
                    <div>Запланированных событий: <span id="eventsAmount"></span></div>
                </div>
            </div>
            <div class="cal-week">
                <span>ПН</span>
                <span>ВТ</span>
                <span>СР</span>
                <span>ЧТ</span>
                <span>ПТ</span>
                <span>СБ</span>
                <span>ВС</span>
            </div>
            <div class="cal-body" data-calendar-area="month"></div>

            <input type="hidden" name="ajax" value="<?php echo Yii::$app->urlManager->createAbsoluteUrl("site/calendar"); ?>">

            <div class="events d-none">
                <h3>события в <span id="month_name_events">:</span></h3>
                <div class="row mx-0 mt-5">
                    <div class="ml-5 col-auto event-date d-flex flex-column" ></div>
                    <div class="col event-name d-flex flex-column"></div>
                </div>
            </div>
        </div>
    </div>
</div>

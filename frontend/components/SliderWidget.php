<?php

namespace app\components;
use yii\base\Widget;
use frontend\models\News;


class SliderWidget extends Widget
{
    private $sliders;
    private $statistics;

    public function init()
    {
        parent::init();
        $model = new News();
        $this->sliders = $model->getNewsForSlider();

        if(!isset($_SESSION['statistic'])){
            $this->statistics = (new \yii\db\Query())
                ->select(['title', 'number'])
                ->from('view_statistic_actual')
                ->where(['actual' => 'true'])
                ->limit(4)
                ->all();
            $_SESSION['statistic'] = $this->statistics;
        }

        $this->statistics = $_SESSION['statistic'];
    }

    public function run(){
        return $this->render('slider', ['sliders' => $this->sliders, 'statistics' => $this->statistics]);
    }
}
<?php

namespace app\components;
use yii\base\Widget;
use frontend\models\News;


class NavbarWidget extends Widget
{

    public function init() {
        parent::init();

    }

    public function run() {
        return $this->render('nav');
    }
}
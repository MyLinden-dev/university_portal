<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 08.01.2019
 * Time: 20:11
 */

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\News;
use yii\web\NotFoundHttpException;

class NewsController extends Controller
{

    public $layout = 'main';

    public function behaviors()
    {
        return [];
    }



    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionNews($id){
        $model = new News();

        $news = $model->getNewsById($id);

//        echo "<pre>";
//        print_r($news);
//        echo "</pre>";
//        die();
        return $this->render('news', ['news' => $news]);
    }

    public function actionIndex(){
        $model = new News();

        $news = $model->getNews();

        foreach($news as &$item){
            foreach ($item['sections'] as &$section){
                if(empty($section['images'])){
                    $section['images'][] =
                        ['path_image' => 'placeholder.png'];
                }
            }
            unset($section);
        }unset($item);

        return $this->render("index", ["newsList" => $news]);
    }
}
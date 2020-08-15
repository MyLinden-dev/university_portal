<?php

namespace backend\controllers;

use Yii;
use common\models\NNews;
use common\models\NNewsSearch;
use common\models\NImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\NSection;
use common\models\NSectionSearch;
use common\models\NSectionImageSearch;
use common\models\NSectionLinkSearch;
use common\models\NCategory;
use common\models\NCategorySearch;

/**
 * NNewsController implements the CRUD actions for NNews model.
 */
class NnewsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    // Здесь запрет перехода на страницу не автоизованному пользователю. 
                    [
                        'allow' => false,
                        'roles' => ['?']
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all NNews models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NNewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NNews model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModelNSection = new NSectionSearch();
        $dataProviderNSection = $searchModelNSection->search(Yii::$app->request->queryParams+['NSectionSearch' => ['==', 'id_news' => $id]]);


        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProviderSection' => $dataProviderNSection,
        ]);
    }

    /**
     * Creates a new NNews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NNews();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_news]);
        }

        $modelNCategory = new NCategory();

        $searchModelNSection = new NSectionSearch();
        $dataProviderNSection = $searchModelNSection->search(Yii::$app->request->queryParams+['NSectionSearch' => ['==', 'id_news' =>$id]]);
        
        return $this->render('create', [
            'model' => $model,
            'modelNCategory' => $modelNCategory,
            'dataProviderNSection' => $dataProviderNSection,
        ]);
    }

    /**
     * Updates an existing NNews model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelNCategory = new NCategory();

        $searchModelNCategory = new NCategorySearch();

        $modelNSection = new NSection();

        $searchModelNSection = new NSectionSearch();
        $dataProviderNSection = $searchModelNSection->search(Yii::$app->request->queryParams+['NSectionSearch' => ['==', 'id_news' =>$id]]);
 /*
        $dataProviderCategory = $searchModelNCategory->search(Yii::$app->request->queryParams);
 
        $widgetParams = [
            'name' => 'dcNСategoryTitle',
            'value' => $model->nCategory->title,
            'inputOptions' => [
                'placeholder' => 'Выберите категорию'
            ],
                
            'containerOptions' => [
                'isExpand' => true,
                'content' => function () use ($dataProviderCategory) {
                    return \yii\grid\GridView::widget([
                        'summary' => false,
                        'showHeader' => false,
                        'columns' => [
                            'title' => [
                                'attribute' => 'title',
                            ],
                        ],
                        'dataProvider' => $dataProviderCategory,
                        'rowOptions' => function ($row) {
                            return [
                                'class' => 'item',
                                'val' => $row['title'],
                                'text' => $row['title'],
                            ];
                        },
                    ]);
                },
            ],
        ];
*/

$searchModelNSectionImage = new NSectionImageSearch();
$dataProviderNSectionImage = $searchModelNSectionImage->search(Yii::$app->request->queryParams+['NSectionImage' => ['==', 'id_section' =>$id]]);
$searchModelNSectionLink = new NSectionLinkSearch();
$dataProviderNSectionLink = $searchModelNSectionLink->search(Yii::$app->request->queryParams+['NSectionLink' => ['==', 'id_section' =>$id]]);

        $searchModelNImage = new NImageSearch();
        $dataProviderNImage = $searchModelNImage->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {
            //$model->id_category = $model->ncategory-id_category-input;
            if ($model->save())
                return $this->redirect(['view', 'id' => $model->id_news]);
        }

        return $this->render('update', [
            'model' => $model,
            'searchModelNSectionImage' => $searchModelNSectionImage,
            'searchModelNSectionLink' => $searchModelNSectionLink,
            'modelNCategory' => $modelNCategory,
            'searchModelNCategory' => $searchModelNCategory,
            'modelNSection' => $modelNSection,
            'dataProviderCategory' => $dataProviderCategory,
            'widgetParams' => $widgetParams,
            'modelNSection' => $modelNSection,
            'dataProviderNSection' => $dataProviderNSection,
            'dataProviderNSectionImage' => $dataProviderNSectionImage,
            'dataProviderNSectionLink' => $dataProviderNSectionLink,
            //'dataProviderNImage' => $dataProviderNImage,
            'isIn' => true,
        ]);
    }

    /**
     * Deletes an existing NNews model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NNews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NNews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NNews::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

        /**
     * Deletes an existing NSection model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
     public function actionDeletensection($id)
     {
         NSectionModel::findOne($id)->delete();
 
         return $this->redirect(['/nsection/index']);
     }

         /**
     * Updates an existing NSection model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdatensection($id)
    {
        $model = NSection::findOne($id);
        $modelNNews = new NNews();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/nsection/update', 'id' => $model->id_section]);
        }

        return $this->render('/nsection/update', [
            'modelSection' => $model,
            'modelNNews' => $modelNNews,
            'dataProviderNSectionImages' => $dataProviderNSectionImages,
            'title_image' => $model->image->title_image,
            'dataProviderSectionLinks' => $dataProviderSectionLinks,
        ]);
    }

        /**
     * Creates a new NNews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
/*     public function actionCreatensection()
     {
        $model = new NSection();
        $modelNNews = new NNews();
 
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['view', 'id' => $model->id_news]);
         }

         return $this->render('/nsection/create', [
             'model' => $model,
             'modelNNews' => $modelNNews,
         ]);
     }
  */  
}

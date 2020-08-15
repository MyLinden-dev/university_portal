<?php

namespace backend\controllers;

use Yii;
use common\models\NSection;
use common\models\NSectionImage;
use common\models\NSectionLink;
use common\models\NImageSearch;
use common\models\NNews;
use common\models\NSectionSearch;
use common\models\NSectionImageSearch;
use common\models\NSectionLinkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * NSectionController implements the CRUD actions for NSection model.
 */
class NsectionController extends Controller
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
                    // Здесь запрет перехода на страницу не авторизованному пользователю. 
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
     * Lists all NSection models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NSectionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NSection model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModelNSectionImages = new NSectionImageSearch();
        $dataProviderSectionImages = $searchModelNSectionImages->search(Yii::$app->request->queryParams+['NSectionImageSearch' => ['==', 'id_section' =>$id]]);
        $searchModelNSectionLinks = new NSectionLinkSearch();
        $dataProviderSectionLinks = $searchModelNSectionLinks->search(Yii::$app->request->queryParams+['NSectionLinkSearch' => ['==', 'id_section' =>$id]]);

        return $this->render('view', [
            'modelSection' => $this->findModel($id),
            'dataProviderSectionImages' => $dataProviderSectionImages,
            'dataProviderSectionLinks' => $dataProviderSectionLinks,
            'title_image' => $model->image->title_image,
        ]);
    }

    /**
     * Creates a new NSection model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NSection();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_section]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NSection model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$modelNNews = new NNews();

        //$modelNSectionImage = new NSectionImage();
        $searchModelNSectionImage = new NSectionImageSearch();
        $dataProviderNSectionImage = $searchModelNSectionImage->search(Yii::$app->request->queryParams+['NSectionImageSearch' => ['==', 'id_section' =>$id]]);

        $searchModelNSectionLink = new NSectionLinkSearch();
        $dataProviderNSectionLink = $searchModelNSectionLink->search(Yii::$app->request->queryParams+['NSectionLinkSearch' => ['==', 'id_section' =>$id]]);

        $searchModelNImage = new NImageSearch();
        $dataProviderNImage = $searchModelNImage->search(Yii::$app->request->queryParams);

        //$dataProviderNImage = $searchModelNImage->search(Yii::$app->request->queryParams+['NImageSearch' => ['==', 'id_image' =>$id]]);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_section]);
        }

        return $this->render('update', [
            'model' => $model,
            //'modelNNews' => $modelNNews,

            //'modelNSectionImage' => $modelNSectionImage,
            'dataProviderNSectionImage' => $dataProviderNSectionImage,
            'dataProviderNSectionLink' => $dataProviderNSectionLink,
            'dataProviderNImage' => $dataProviderNImage,
        ]);
    }

    /**
     * Deletes an existing NSection model.
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
     * Finds the NSection model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NSection the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NSection::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

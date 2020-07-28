<?php

namespace app\modules\admin\controllers;
//namespace app\controllers;

use Yii;
use app\models\Bbbmenu;
use app\models\BbbmenuSearch;
use app\models\Bbbgallery;
// use yii\web\Controller;
//use app\modules\admin\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use yii\web\UploadedFile;

/**
 * MenuController implements the CRUD actions for Bbbmenu model.
 */
class MenuController extends AdminController
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),[
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ]);
    }

    /**
     * Lists all Bbbmenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->registerCssFile('@web/css/site.css', [
            'depends' => [\yii\bootstrap\BootstrapAsset::className()],
            'media' => 'print',
        ], 'css-print-theme');

        $searchModel = new BbbmenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bbbmenu model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Bbbmenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bbbmenu();
        $gallery = new Bbbgallery();

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } */

        if ($model->load(Yii::$app->request->post()) && $gallery->load(Yii::$app->request->post()) ) {

           // $model->text = $gallery->text;
          //  $model->gallery = $gallery->gallery;


            if (!$model->save()){
                throw new NotFoundHttpException('The model was not loaded.');
            }
            $gallery->model_id = $model->id;

            if (!$gallery->save()){
                throw new NotFoundHttpException('The GALLery was not loaded.');
            }
            else {
                $gallery->gallery = UploadedFile::getInstances($gallery,'gallery');
                if ($gallery->gallery)
                {
                    $gallery->uploadGallery();
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'gallery' => $gallery,
        ]);
    }

    /**
     * Updates an existing Bbbmenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $gallery = Bbbgallery::findOne(['model_id' => $model->id]);
//
        if ($model->load(Yii::$app->request->post()) && $gallery->load(Yii::$app->request->post()) ) {
             if (!$model->save()){
                 throw new NotFoundHttpException('The model was not loaded.');
             }


            if ($gallery->save()){
                $gallery->gallery = UploadedFile::getInstances($gallery,'gallery');
                if ($gallery->gallery)
                {
                    $gallery->uploadGallery();
                }

            }
            else {
                 throw new NotFoundHttpException('The GALLery was not loaded.');
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'gallery' => $gallery,

        ]);
    }

    public function actionDelfiles($id)
    {

        $gallery = Bbbgallery::findOne($id);
        $gallery ->removeImages();
        return $this->redirect(['index']);

    }

    /**
     * Deletes an existing Bbbmenu model.
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
     * Finds the Bbbmenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bbbmenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bbbmenu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

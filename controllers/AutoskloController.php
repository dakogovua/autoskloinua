<?php


namespace app\controllers;


use yii\helpers\Html;
use yii\web\Controller;
use app\models\Bbbmenu;
//use app\models\Bbbnews;
use app\models\Bbbgallery;
use yii\web\NotFoundHttpException;
use Yii;

class AutoskloController extends Controller
{

    public $layout = 'autosklo';



    public function actionIndex()
    {
        // debug($_GET);
        $alias  = Yii::$app->request->get('alias'); // либо ($alias = null)
       // echo $alias;
        if ($alias == null) {
            $alias = 'index';
        }

        $data = Bbbmenu::find()->where(['alias' => $alias])->one();
        $gallery = $this->findModel(['model_id' => $data->id]);


        if ($data === null) { // item does not exist
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }

        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $data['description'],
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $data['keywords'],
        ]);

        // debug($data);
        return $this->render('index', compact('data','gallery'));
    }

    public function actionSearch(){
        $q  = trim(Html::encode(Yii::$app->request->get('q')));
        if (!$q){
            return $this->render('search', compact('search','q'));
        }

        $search = Bbbmenu::find()->where(['like','body', $q])->all();

        return $this->render('search', compact('search','q'));

    }

    protected function findModel($id)
    {
        if (($gallery = Bbbgallery::findOne(['model_id' => $id])) !== null) {
            return $gallery;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
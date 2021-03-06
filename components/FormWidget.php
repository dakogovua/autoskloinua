<?php


namespace app\components;

use yii\base\Widget;
use app\models\ContactForm;
use Yii;



class FormWidget extends Widget
{
    public $formHtml;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run(){
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return 'Форма отправлена';
        }
        $this->formHtml=$this->catToTemplate($model);
        return $this->formHtml;
    }

    protected function catToTemplate($model){
        ob_start();
        include __DIR__. '/form_tpl/'.'form.php';
        return ob_get_clean();
    }
}
<?php

namespace app\components;
use yii\base\Widget;
use app\models\Bbbnews;



class NewsWidget extends Widget
{
    public $newsHtml;
    public $data;

    public function init()
    {
        parent::init();
    }

    public function run(){
       $this->data = Bbbnews::find()
            -> orderBy([
                'date'=>SORT_ASC
            ])
            ->indexBy('id')
            ->asArray()
            ->all();


        $this->newsHtml=$this->getMenuHtml($this->data);

        return $this->newsHtml;
    }


    protected function getMenuHtml($tree){
        $str = '<div class="accordion" id="accordionExample">';
        foreach ($tree as $onenews){
            $str .= $this->catToTemplate($onenews);
        }
        $str .= '</div>';
        return $str;
    }

    protected function catToTemplate($onenews){
        ob_start();
        include __DIR__. '/news_tpl/'.'news.php';
        return ob_get_clean();
    }

}
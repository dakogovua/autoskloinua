<?php

namespace app\components;
use yii\base\Widget;
use app\models\Bbbmenu;
use yii\helpers\Html;
use Yii;

class MenuWidget extends Widget
{
    public $tpl;
    public $data; // all from menue
    public $menuHtml;
    public $tree;

    public function init(){
      //  parent::init();
        if ($this->tpl === null){
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        $cacheMenu= Yii::$app->cache->get('menu');
        // read cache
        if($cacheMenu && $this->tpl == 'menu'){
            return $cacheMenu;
        }

        $this->data = Bbbmenu::find()->
            orderBy([
                'position'=>SORT_DESC
            ])
            ->indexBy('id')
            ->asArray()->all();
        //$this->tree
        $this->menuHtml=$this->getMenuHtml($this->data);
       // debug($this->data);

        if ($this->tpl == 'menu') {
            Yii::$app->cache->set('menu', $this->menuHtml, 3600);
            // write cache
        }

        return $this->menuHtml;
      //  parent::run(); // TODO: Change the autogenerated stub

    }

    protected function getMenuHtml($tree){
        $str = '<nav role="navigation">
                        <label for="show-menu" class="show-menu">&#9776; Меню</label>
                        <input type="checkbox" id="show-menu" role="button">
                        <ul>';
        foreach ($tree as $category){
            $str .= $this->catToTemplate($category);
        }

        if ($this->tpl === 'admin.php'){

            $str .= "<hr>";

            $str .= '<li>'.Html::a('Новости','/admin/news').'</li>';
            $str .= '<li>'.Html::a('Все меню','/admin/menu').'</li>';

        }

        $str .= '</ul>
                    </nav>';

        return $str;
    }

    protected function catToTemplate($category){
        ob_start();
        include __DIR__. '/menu_tpl/'.$this->tpl;
        return ob_get_clean();
    }

}
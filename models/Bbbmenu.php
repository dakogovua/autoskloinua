<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bbbmenu".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $body
 * @property string $alias
 * @property int $position
 * @property string $menu_name
 */
class Bbbmenu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bbbmenu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body'], 'string'],
            [['position'], 'integer'],
            //[['menu_name'], 'required'],
            [['title'], 'string', 'max' => 120],
            [['description', 'keywords'], 'string', 'max' => 140],
            [['alias'], 'string', 'max' => 20],
            [['menu_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'body' => 'Body',
            'alias' => 'Alias',
            'position' => 'Position',
            'menu_name' => 'Menu Name',
        ];
    }


}

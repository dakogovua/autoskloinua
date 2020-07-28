<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bbbnews".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $seotitle
 * @property string $seokeywords
 * @property string $seodescription
 * @property string $date
 */
class Bbbnews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bbbnews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 500],
            [['seotitle', 'seokeywords'], 'string', 'max' => 255],
            [['seodescription'], 'string', 'max' => 300],
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
            'content' => 'Content',
            'seotitle' => 'Seotitle',
            'seokeywords' => 'Seokeywords',
            'seodescription' => 'Seodescription',
            'date' => 'Date',
        ];
    }
}

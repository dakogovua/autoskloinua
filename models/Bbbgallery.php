<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "bbbgallery".
 *
 * @property int $id
 * @property string $text
 */
class Bbbgallery extends \yii\db\ActiveRecord
{
    public $gallery;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bbbgallery';
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 50 ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'gallery' => 'Изображения',
        ];
    }

    public function uploadGallery(){
        if ($this->validate()){
            foreach ($this->gallery as $file){
                $path = 'images'.$file->baseName.'.'.$file->extension;
                $file->saveAs($path);
                $this->attachImage($path, false);
                @unlink($path);

            }
            return true;
        }
        else {
            return false;
        }
    }




}

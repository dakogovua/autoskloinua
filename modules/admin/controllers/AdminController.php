<?php
/**
 * Created by PhpStorm.
 * User: ggg
 * Date: 27.12.2018
 * Time: 18:18
 */

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        // 'actions' => ['login', 'signup'],
                        'roles' => ['@'],
                    ],

                ],
            ],
        ];
    }
}
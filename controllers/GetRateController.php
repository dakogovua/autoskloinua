<?php

namespace app\controllers;
use \yii\web\Controller;

use \DateTime;
use DatePeriod;
use \DateInterval;
use app\models\Getratemodel;
use Yii;

class GetRateController extends Controller
{

    public $layout = false;

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public static function allowedDomains() {
        return [
            '*',                        // star allows all domains
            //       'http://test1.example.com',
            //       'http://test2.example.com',
        ];
    }

    public function behaviors() {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }

    public function actionIndex()
    {
        $dateonly = date("Y-m-d");
        //Сегодняшняя дата

        $data = Getratemodel::getTodayRate($dateonly);

        if ($data->id == 0) {


            $url = "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?json";
//  Initiate curl
            $ch = curl_init();
// Disable SSL verification
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
            curl_setopt($ch, CURLOPT_URL, $url);
// Execute
            $result = curl_exec($ch);
// Closing
            curl_close($ch);
            if (!empty($result)) {
                $array = json_decode($result, true);

                $array_USD_EUR = ["USD" => "", "EUR" => ""];

                foreach ($array as $array_id) {
                    foreach ($array_id as $key => $value) {
                        if ($key == "r030" && $value == 840) {
                            $array_USD_EUR["USD"] = $array_id["rate"];
                        }

                        if ($key == "r030" && $value == 978) {
                            $array_USD_EUR["EUR"] = $array_id["rate"];
                        }
                    }
                }

                $eur = $array_USD_EUR["EUR"];
                $usd = $array_USD_EUR["USD"];

                //echo $eur.";".$usd;
                $data = new Getratemodel();
                $data->ratedate = $dateonly;
                $data->rateusd = $usd;
                $data->rateeur = $eur;
                $data->save();

            }
            else
            {
                $data = Getratemodel::getLast($dateonly);
            }
        }
        else
        {
            $data = Getratemodel::getLast($dateonly);
        }


        return $this->render('index', ['dbtoday' => $data,
                                        'dateonly'=>$dateonly,
                                        'yesterday' => $yesterday
                            ]);
    }

    public function actionPost(){
     //   return 'aaaa';
        print_r($_POST);

     //   return $this->render('index',['usd' => $usd]);
    }

}
<?php
//Этот класс делает курс актуальный, если банк не отвечает, то берет последний из бд

namespace app\models;
use yii\db\ActiveRecord;


class Getratemodel extends ActiveRecord
{
    public static function tableName()
    {
        return '{{aaagetrate}}';
    }

    public static function getTodayRate($dateonly)
    {
        $rate  = self::find()
            ->where(['ratedate' => $dateonly])
            ->one();

        return $rate;
    }

    public static function getLast($dateonly)

    {

        do{
            $date = new \DateTime($dateonly);
            $date->add(\DateInterval::createFromDateString('yesterday'));
            $yesterday = $date->format('Y-m-d');

            $rate  = self::find()
                ->where(['ratedate' => $dateonly])
                ->one();

            $dateonly = $yesterday;
            // echo $dateonly.' '.$yesterday;
        }
        while ($rate->id == null);

        return $rate;
    }
}
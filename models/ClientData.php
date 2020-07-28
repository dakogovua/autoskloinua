<?php
/**
 * Created by PhpStorm.
 * User: ggg
 * Date: 01.11.2018
 * Time: 18:52
 */

namespace app\models;
use yii\db\ActiveRecord;


class ClientData extends ActiveRecord
{
   /*
    public $programm;
    public $date_to;
    public $period_days;
    public $multi;
    public $period_multi;
    public $franshise;
    public $pocket;
    public $cover1;
    public $currency1;
    public $cover2;
    public $currency2;
    public $cover3;
    public $currency3;
    public $cover4;
    public $currency4;
    public $luggage;
    public $delayed;
    public $vendorCount;
    public $doc_date;
    public $doc_number;
    public $draft;
    public $date_from;
    public $date_period;
    public $addSchengen;
    public $vendor_goal;
    public $telstrah;
    public $emailstrah;
    public $vendor_inn;
    public $vendor_name1;
    public $vendor_name2;
    public $vendor_birthday;
    public $vendor_address_address;
    public $vendor_only_policyholder;
   public $vendor0bd;
   public $vendor0goal;

   public $vendor1bd;
   public $vendor1goal;

    public $vendor2bd;
    public $vendor2goal;

    public $vendor3bd;
    public $vendor3goal;

    public $vendor4bd;
    public $vendor4goal;
*/


    // public $vendors.0.bd;

    public static function tableName(){
        return '{{aaavendorsarsenal}}';
    }

    public function rules(){
        return [
            [['programm','date_to','period_days','multi','period_multi','franshise','pocket','cover1','currency1','cover2','currency2','cover3','currency3','cover4','currency4','luggage','delayed','vendorCount','doc_date','doc_number','draft','date_from','date_period','addSchengen','vendor_goal','telstrah','emailstrah','vendor_inn','vendor_name1','vendor_name2','vendor_birthday','vendor_address_address'], 'required' ],
           // ['multi', 'safe'],
            ['emailstrah', 'email'],
            [['vendor_only_policyholder', 'sumapi'], 'trim'],
        ];
    }

    public function getOther(){
        return $this->hasMany(OtherVendordata::className(), ['doc_number_id' => 'doc_number']);
    }



}
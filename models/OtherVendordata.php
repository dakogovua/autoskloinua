<?php
/**
 * Created by PhpStorm.
 * User: ggg
 * Date: 01.11.2018
 * Time: 18:52
 */

namespace app\models;
use yii\db\ActiveRecord;


class OtherVendordata extends ActiveRecord
{
    public $tpl_name30;
    public $tpl_title_translit0;
    public $tpl_address_index0;
    public $tpl_address_city0;
    public $tpl_address_address0;
    public $tpl_address_translit0;
    public $tpl_name31;
    public $tpl_title_translit1;
    public $tpl_address_index1;
    public $tpl_address_city1;
    public $tpl_address_address1;
    public $tpl_address_translit1;
    public $tpl_name32;
    public $tpl_title_translit2;
    public $tpl_address_index2;
    public $tpl_address_city2;
    public $tpl_address_address2;
    public $tpl_address_translit2;
    public $tpl_name33;
    public $tpl_title_translit3;
    public $tpl_address_index3;
    public $tpl_address_city3;
    public $tpl_address_address3;
    public $tpl_address_translit3;


    public static function tableName()
    {
        return '{{aaaother_vendors}}';
    }

    public function rules()
    {
        return [
            [['tpl_goal0','tpl_inn0','tpl_name10','tpl_name20','tpl_name30','tpl_birthday0','tpl_intpass_series0','tpl_intpass_number0','tpl_goal1','tpl_inn1','tpl_name11','tpl_name21','tpl_birthday1','tpl_intpass_series1','tpl_intpass_number1','tpl_goal2','tpl_inn2','tpl_name12','tpl_name22','tpl_birthday2','tpl_intpass_series2','tpl_intpass_number2','tpl_goal3','tpl_inn3','tpl_name13','tpl_name23','tpl_birthday3','tpl_intpass_series3','tpl_intpass_number3'], 'trim' ],

        ];
    }



}
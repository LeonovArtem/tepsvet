<?php

namespace app\models;


use yii\base\Model;


class Calculate extends Model
{
    public $price;
    public $time;
    public $countGoods;

    public function rules()
    {
        return [
            [['price', 'time'], 'required'],
            ['price', 'double'],
            [['time','countGoods'], 'integer'],
            ['price', 'default', 'value' => 1.83]
        ];
    }

    public function attributeLabels()
    {
        return [
            'price' => 'Цена 1 КвЧ:',
            'time' => 'Время работы ламп в день(ч.):',
            'countGoods' => 'Количество:'
        ];
    }

}
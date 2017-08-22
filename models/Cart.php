<?php
/**
 * Виртуальная корзина
 */

namespace app\models;


use yii\base\Model;

//use app\models\Lamps;

/**
 * Вход:
 * sumQuantity - количество выбранных ламп
 * sumCost – общая цена выбранных ламп
 * sumPower – общая мощность выбранных ламп
 *
 * kwhPrice – стоимость 1 КвЧ
 * hourDay - количество часов работы лампы в день
 *
 * Константы:
 * AVG_LIFE_TIME =42 – средний срок службы обычной лампы (в днях) в часах (1000)
 * AVG_PRICE = 15 – средняя цена обычной лампы
 *
 * Выход:
 * payoffPeriod – период окупаемости
 */
class Cart extends Model
{
    public $sumQuantity = 0;
    public $sumCost = 0;
    public $sumPower = 0;
    public $payOffPeriod = 0;
    public $goods = [];

    public $kwhPrice = 1.84;
    public $hourDay = 4;

    const AVG_LIFE_TIME = 1000;
    const AVG_PRICE = 65;

    public function getCalculate($cartLamps)
    {
        $this->kwhPrice = $cartLamps['price'];
        $this->hourDay = $cartLamps['time'];
        //Меняем ключи местами - ключи это id элементов
        $cartLamps = array_filter($cartLamps['countGoods']);
        if (count($cartLamps)) {
            $arrId = array_keys($cartLamps);
            $lamps = Lamps::findAll($arrId);
            foreach ($lamps as $lamp) {
                $selectQty = $cartLamps[$lamp->id]; //Выбранное количество
                $this->sumCost += $lamp->price * $selectQty;
                $this->sumQuantity += $selectQty;
                $this->sumPower += $lamp->power;
                $lamp->setQuantity($cartLamps[$lamp->id]);
                $this->goods[] = $lamp;
            }
            $this->payOffPeriod = round($this->sumCost / (($this->sumPower * $this->hourDay * $this->kwhPrice * 4 / 1000) + ($this->sumQuantity * $hourDay * self::AVG_PRICE / self::AVG_LIFE_TIME)));
            return $this;
        }
        return false;
    }
}
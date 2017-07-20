<?php

namespace app\modules\admin\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%lamps}}".
 *
 * @property integer $id
 * @property string $article
 * @property string $name
 * @property double $power
 * @property integer $luminous
 * @property string $cap
 * @property integer $length
 * @property integer $width
 * @property integer $lifetime
 * @property double $price
 * @property string $shape
 * @property string $description
 * @property integer $sortorder
 */
class Lamps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lamps}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['power', 'price'], 'number'],
            [['article', 'name', 'shape', 'price'], 'required'],
            [['luminous', 'length', 'width', 'lifetime', 'sortorder'], 'integer'],
            [['description'], 'string'],
            [['article'], 'string', 'max' => 14],
            [['name'], 'string', 'max' => 128],
            [['cap'], 'string', 'max' => 16],
            [['shape'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article' => 'Артикул',
            'name' => 'Наименование',
            'power' => 'Мощность (w)',
            'luminous' => 'Световой поток (lm)',
            'cap' => 'Цоколь',
            'length' => 'Длина(мм)',
            'width' => 'диаметр (ширина)(мм)',
            'lifetime' => 'Срок службы (час)',
            'price' => 'Цена (руб.)',
            'shape' => 'Форма',
            'description' => 'Описание',
            'sortorder' => 'Сортировка',
        ];
    }

    public function getMenu($column)
    {
        $menu = self::find()->select($column)->distinct($column)->all();
        $arrMenu = [];
        foreach ($menu as $item) {
            $arrMenu[] = $item->$column;
        }
        sort($arrMenu);
        return $arrMenu;
    }
}

<?php

namespace app\models;


use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "ts_slider".
 *
 * @property integer $id
 * @property string $img
 * @property string $content
 * @property string $caption
 * @property integer $sort
 */
class Slider extends ActiveRecord
{
    public static function getItemSlider()
    {
        $arrSlide = [];
        $slider = self::find()->orderBy('sort')->all();
        foreach ($slider as $item) {
            $arrSlide[] = [
                'content' => Html::img($item->img),
                'caption' => "<h3>{$item->content}</h3>" . "<p>{$item->caption}</p>",
            ];
        }
        return $arrSlide;
    }

    /**
     * @inheritdoc
     */
    public
    static function tableName()
    {
        return 'ts_slider';
    }

    /**
     * @inheritdoc
     */
    public
    function rules()
    {
        return [
            [['img'], 'required'],
            [['img', 'content', 'caption'], 'string'],
            [['sort'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public
    function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Изображение',
            'content' => 'Заголовок',
            'caption' => 'Контент',
            'sort' => 'Сортировка',
        ];
    }
}

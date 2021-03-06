<?php

namespace app\modules\admin\models;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "{{%slider}}".
 *
 * @property integer $id
 * @property string $img
 * @property string $content
 * @property string $caption
 * @property integer $sort
 */
class Slider extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%slider}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
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
    public function attributeLabels()
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

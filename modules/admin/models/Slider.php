<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%slider}}".
 *
 * @property integer $id
 * @property string $img
 * @property string $head
 * @property string $content
 * @property integer $sort
 */
class Slider extends \yii\db\ActiveRecord
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
            [['img', 'head', 'content'], 'string'],
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
            'head' => 'Заголовок',
            'content' => 'Контент',
            'sort' => 'Сортировка',
        ];
    }
}

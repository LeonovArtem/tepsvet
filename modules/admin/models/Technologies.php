<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%technologies}}".
 *
 * @property integer $id
 * @property integer $sort
 * @property string $url
 * @property string $head
 * @property string $content
 */
class Technologies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%technologies}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [['url','head','content'], 'required'],
            [['url', 'head', 'content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ID',
            'sort' => 'Сортировка',
            'url' => 'Url',
            'head' => 'Заголовок',
            'content' => 'Контент',
        ];
    }
}

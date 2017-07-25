<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%advice}}".
 *
 * @property integer $id
 * @property integer $sort
 * @property string $url
 * @property string $head
 * @property string $content
 */
class Advice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%advice}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [['url'], 'required'],
            [['url', 'head', 'content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sort' => 'Sort',
            'url' => 'Url',
            'head' => 'Head',
            'content' => 'Content',
        ];
    }
}

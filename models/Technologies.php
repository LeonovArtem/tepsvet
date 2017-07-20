<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%technologies}}".
 *
 * @property integer $id
 * @property integer $sort
 * @property string $head
 * @property string $content
 */
class Technologies extends ActiveRecord
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
            [['head', 'content'], 'string'],
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
            'head' => 'Head',
            'content' => 'Content',
        ];
    }
}

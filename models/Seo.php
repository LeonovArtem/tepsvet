<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%seo}}".
 *
 * @property integer $id
 * @property string $site_action
 * @property string $title
 * @property string $keywords
 * @property string $description
 */
class Seo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%seo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['site_action', 'title'], 'string', 'max' => 50],
            [['keywords', 'description'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'site_action' => 'Url',
            'title' => 'Заголовок',
            'keywords' => 'Ключевые слова(keywords)',
            'description' => 'Описание(description)',
        ];
    }
}

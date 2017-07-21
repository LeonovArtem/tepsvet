<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%catalog}}".
 *
 * @property integer $id
 * @property integer $status
 * @property string $name
 * @property string $img
 * @property double $file_size
 * @property string $file_puth_pdf
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%catalog}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'img', 'file_puth_pdf'], 'required'],
            [['status'], 'integer'],
            [['name', 'img', 'file_puth_pdf'], 'string'],
            [['file_size'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Активность',
            'name' => 'Заголовок',
            'img' => 'Изображение',
            'file_size' => 'Размер файла (Мб)',
            'file_puth_pdf' => 'Файл каталога(pdf)',
        ];
    }
}

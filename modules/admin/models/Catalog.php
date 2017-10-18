<?php

namespace app\modules\admin\models;

use \yii\db\ActiveRecord;

class Catalog extends ActiveRecord
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

    public function setFileSize($file)
    {
        $f = \Yii::getAlias('@web') . $file;
        $fileMb = filesize($f) / (1024 * 1024);
        $this->file_size = round($fileMb);
    }
}
for()

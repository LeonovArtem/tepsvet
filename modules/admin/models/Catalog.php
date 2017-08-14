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

    public function setFileSize($file)
    {
        $fileMb = filesize($_SERVER['DOCUMENT_ROOT'] . $file) / (1024 * 1024);
        $this->file_size = round($fileMb);
    }

//    public function getFileSize($file)
//    {
//        $fileSize = filesize($file);
//        // Если размер больше 1 Кб
//        if ($fileSize > 1024) {
//            $fileSize = ($fileSize / 1024);
//            // Если размер файла больше Килобайта
//            // то лучше отобразить его в Мегабайтах. Пересчитываем в Мб
//            if ($fileSize > 1024) {
//                $fileSize = ($fileSize / 1024);
//                // А уж если файл больше 1 Мегабайта, то проверяем
//                // Не больше ли он 1 Гигабайта
//                if ($fileSize > 1024) {
//                    $fileSize = ($fileSize / 1024);
//                    $fileSize = round($fileSize, 1);
//                    return $fileSize . " Гб";
//                } else {
//                    $fileSize = round($fileSize, 1);
//                    return $fileSize . " Mб";
//                }
//            } else {
//                $fileSize = round($fileSize, 1);
//                return $fileSize . " Кб";
//            }
//        } else {
//            $fileSize = round($fileSize, 1);
//            return $fileSize . " байт";
//        }
//    }

}

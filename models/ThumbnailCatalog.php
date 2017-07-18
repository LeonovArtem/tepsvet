<?php
namespace app\models;


use yii\db\ActiveRecord;

class ThumbnailCatalog extends ActiveRecord
{
    public function addCatalog($headName, $img, $file = '')
    {
        $this->headName = $headName;
        $this->img = $img;
        $this->save();
    }
}
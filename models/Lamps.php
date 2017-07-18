<?php

namespace app\models;

use yii\db\ActiveRecord;

class Lamps extends ActiveRecord
{
    static $tableLams;

    public static function getTable()
    {
        if (isset(self::$tableLams)) {
            return self::$tableLams;
        }
        return self::$tableLams = self::find()->all();
    }

    public static function getMenu($column)
    {
        return self::find()->select($column)->groupBy($column)->asArray()->all();
    }

    public static function addArticle()
    {
        $table = self::find()->all();
        foreach ($table as $lamp) {
            $lamp->article = self::convertArticle($lamp->name);
            $lamp->save();
        }
    }

    public static function delArticleInName()
    {
        foreach (self::getTable() as $lamp) {
            preg_match_all('/\s(.+)/u', $lamp->name, $matches);
            $name = $matches[1][0];
            echo $name . '<br>';
        }
    }

    public static function convertArticle($str)
    {
        preg_match_all('/\w+/', $str, $matches);
        return $matches[0][0];
    }

}
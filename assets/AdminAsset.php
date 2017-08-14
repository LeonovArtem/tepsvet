<?php
/**Шаблон админки*/

namespace app\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/admin/';
    public $css = [
        'css/admin.css'
    ];
}
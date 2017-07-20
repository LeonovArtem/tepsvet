<?php
/**Шаблон админки*/

namespace app\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $js = [
        'datatables/dataTables.bootstrap.min.js',
    ];
    public $css = [
        'datatables/dataTables.bootstrap.css',
        

    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];
}
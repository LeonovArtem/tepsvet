<?php

namespace app\components\chat;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Andy Fitria <sintret@gmail.com>
 */
class ChatJs extends AssetBundle {

    public $sourcePath = '@app/components/chat/assets';
    public $js = [
        'js/chat.js',
        'css/chat.css'
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}

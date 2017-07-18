<?php

namespace app\commands;

use yii\console\Controller;


class CatalogController extends Controller
{
    public $registerNameImg;

    private $imgPath;
    private $urlUpload = 'http://www.svetonic.ru';

    /**
     * This command running import image from www.svetonic.ru
     */

    public function actionImportImg()
    {
        $catalogJson = file_get_contents($this->urlUpload . '/get-ajax/catalog.php');
        $catalog = json_decode($catalogJson);
        $this->setPath();

        for ($i = 0, $n = count($catalog); $i < $n; $i++) {
            $product = $catalog[$i];
            $fileImg = file_get_contents($this->urlUpload . $product->img);
            $this->saveImgFile($product->article, $fileImg);
        }
    }

    public function options($actionID)
    {
        return ['registerNameImg'];
    }

    public function optionAliases()
    {
        return ['r' => 'registerNameImg'];
    }

    private function saveImgFile($fileName, $dataFile)
    {
        $file = $this->imgPath . strtoupper($fileName) . '.' . 'png';
        file_put_contents($file, $dataFile);
    }

    private function setPath()
    {
        $basePath = $GLOBALS['config']['basePath'];
        $imgPath = '/web/img/catalog/';
        $validPath = str_replace('/', DIRECTORY_SEPARATOR, $imgPath);

        $this->imgPath = $basePath . $validPath;
    }
}
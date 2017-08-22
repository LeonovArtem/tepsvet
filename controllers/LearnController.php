<?php
/**
 * Created by PhpStorm.
 * User: TrashCoder
 * Date: 20.08.2017
 * Time: 23:56
 */

namespace app\controllers;


use yii\web\Controller;

class LearnController extends Controller
{
    public function actionIndex()
    {
        return $this->render('learn');
    }
}
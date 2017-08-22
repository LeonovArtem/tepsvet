<?php
/**
 * Устанавливает параметры для Seo
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\Seo;

class SeoController extends Controller
{
    public function beforeAction($action)
    {
        $this->setMetaTag($action->id);

        return parent::beforeAction($action);
    }

    private function setMetaTag($actionId)
    {
        $seo = Seo::find()->filterWhere(['site_action' => $actionId])->one();
        if (isset($seo->id)) {
            $this->view->title = $seo->title;
            $this->view->registerMetaTag(
                [
                    'name' => 'keywords',
                    'content' => $seo->keywords,
                ]);
            $this->view->registerMetaTag(
                [
                    'name' => 'description',
                    'content' => $seo->description,
                ]);
            $this->view->params['breadcrumbs'][] = $this->view->title;

            return true;
        }
        return false;
    }
}
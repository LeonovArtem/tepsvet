<?php

namespace app\controllers;

use app\models\Cart;
use Yii;

use app\models\Calculate;
use yii\data\Pagination;
use app\models\Lamps;

class CatalogController extends SeoController
{
    public function actionIndex()
    {
        $query = Lamps::find();
        $this->view->title = 'Каталог';
        $this->view->params['breadcrumbs'][] = [
            'label' => $this->view->title,
            'url' => ['/site/catalog']
        ];

        $leftMenu = [
            'По форме' => Lamps::getMenu('shape'),
            'По цоколю' => Lamps::getMenu('cap'),
        ];
        $cap = Yii::$app->request->get('cap');
        $shape = Yii::$app->request->get('shape');
        if ($cap || $shape) {
            $query->orFilterWhere(['cap' => $cap, 'shape' => $shape]);
            $this->view->params['breadcrumbs'][] = $cap ? $cap : $shape;
        }
        $pages = new Pagination(
            [
                'totalCount' => $query->count(),
                'pageSize' => 20,
                'pageSizeParam' => false,
                'forcePageParam' => false
            ]);

        $lamps = $query->asArray()->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('lamps', 'pages', 'leftMenu'));
    }

    public function actionCalculate()
    {
        $query = Lamps::find()->where('power>0');
        $this->view->title = 'Каталог';
        $this->view->params['breadcrumbs'][] = [
            'label' => $this->view->title,
            'url' => ['/site/catalog']
        ];

        $leftMenu = [
            'По форме' => Lamps::getMenu('shape'),
            'По цоколю' => Lamps::getMenu('cap'),
        ];
        $cap = Yii::$app->request->get('cap');
        $shape = Yii::$app->request->get('shape');
        if ($cap || $shape) {
            $query->andFilterWhere(['cap' => $cap, 'shape' => $shape]);
            $this->view->params['breadcrumbs'][] = $cap ? $cap : $shape;
        }
        $pages = new Pagination(
            [
                'totalCount' => $query->count(),
                'pageSize' => 20,
                'pageSizeParam' => false,
                'forcePageParam' => false
            ]);
        $lamps = $query->asArray()->offset($pages->offset)->limit($pages->limit)->all();
        $model = new Calculate();

        if (Yii::$app->request->post('Calculate')) {
            $calculate = Yii::$app->request->post('Calculate');
            $cart = new Cart();
            $cartGoods = $cart->getCalculate($calculate);
        }

        return $this->render('calculate', compact('cartGoods', 'model', 'lamps', 'pages', 'leftMenu'));
    }

//    public function actionGetModal()
//    {
////        if (Yii::$app->request->isAjax) {
//        if (Yii::$app->request->post('Calculate')) {
//            $calculate = Yii::$app->request->post('Calculate');
//            $cart = new Cart();
//            $cartGoods = $cart->getCalculate($calculate);
//        }
//    }

}

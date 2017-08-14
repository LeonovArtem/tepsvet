<?php

namespace app\controllers;

use phpDocumentor\Reflection\Types\This;
use yii\helpers\Html;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\Pagination;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Seo;
use app\models\Lamps;
use app\models\Technologies;
use app\models\Advice;
use app\models\Catalog;
use app\models\Slider;

class SiteController extends Controller
{
    public function beforeAction($action)
    {
        $this->setMetaTag($action->id);
        return parent::beforeAction($action);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $catalog = Catalog::find()->where(['status' => 1])->all();
        $slider = Slider::getItemSlider();
        return $this->render('index', compact('catalog', 'slider'));
    }

    public function actionDownloadFile()
    {
        if ($id = Yii::$app->request->post('id')) {
            $file = Catalog::findOne($id);
            if ($file === null) {
                throw new NotFoundHttpException('Файл не найден');
            }
            return Yii::$app->response->sendFile($_SERVER['DOCUMENT_ROOT'] . $file->file_puth_pdf);
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//
//            return $this->refresh();
//        }
        return $this->render('contacts');
    }

    public function actionAdvice($url = '')
    {
        $this->view->title = 'Советы';
        $this->view->params['breadcrumbs'][] = ['label' => $this->view->title];
        $query = Advice::find()->orderBy('sort');
        $postMenu = $query->all();

        $query->filterWhere(['url' => $url ? $url : 'home']);
        $post = $query->one();

        return $this->render('advice', compact('postMenu', 'post'));
    }

    public function actionProfit()
    {
        $catalog = Catalog::find()->where(['status' => 1])->all();
        return $this->render('profit', compact('catalog'));
    }

    public function actionHightech($url = '')
    {
        $query = Technologies::find()->orderBy('sort');
        $postMenu = $query->all();

        $query->filterWhere(['url' => $url ? $url : 'hightech']);
        $post = $query->one();

        return $this->render('high-tech', compact('postMenu', 'post'));
    }

    public function actionCatalog($cap = '', $shape = '', $calculate = false)
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
        if ($calculate) {
            $view = 'calculate';
        } else {
            $view = 'catalog';
        }
        return $this->render($view, compact('lamps', 'pages', 'leftMenu'));
    }

    public function actionJobs()
    {
        return $this->render('jobs');
    }

    public function actionTest()
    {
       echo $sizeMb = filesize($_SERVER['DOCUMENT_ROOT'] . '/web/uploads/catalog_pdf/cat_2017_1.pdf') ;
//        echo round();
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {

        return $this->render('about');
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

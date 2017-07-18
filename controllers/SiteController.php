<?php

namespace app\controllers;

use phpDocumentor\Reflection\Types\This;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Lamps;
use yii\data\Pagination;

class SiteController extends Controller
{
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
        return $this->render('index');
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
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAdvice()
    {
        return $this->render('advice');
    }

    public function actionProfit()
    {
        return $this->render('profit');
    }

    public function actionHighTech()
    {
        return $this->render('high-tech');
    }

    public function actionCatalog($cap = '', $shape = '')
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
        return $this->render('catalog', compact('lamps', 'pages', 'leftMenu'));
    }

    public function actionJobs()
    {
        return $this->render('jobs');
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

}

<?php
use sintret\chat\ChatRoom;
use yii\helpers\Url;
use \app\modules\admin\models\User;

$this->title = 'Админка';
$this->params['breadcrumbs'][] = 'Админка'; ?>

<div class="admin-default-index">
    <!--        <h1>--><? //= $this->context->action->uniqueId ?><!--</h1>-->
    <div class="box-header with-border">
        <!--        <h3 class="box-title">Документация по использованию:</h3>-->
    </div>
    <br>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <a href="<?= Url::toRoute(['lamps/']) ?>">
                <div class="small-box bg-aqua">

                    <div class="inner">
                        <h3>Лампы</h3>
                        <p>Каталог</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <h3></h3>
                    <p class="small-box-footer">Подробнее
                        <i class="fa fa-arrow-circle-right"></i>
                    </p>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-xs-6">
            <a href="<?= Url::toRoute(['catalog/']) ?>">
                <div class="small-box bg-green">

                    <div class="inner">
                        <h3>Каталог</h3>
                        <p>(в формате PDF)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-pdf-o"></i>
                    </div>
                    <h3></h3>
                    <p class="small-box-footer">Подробнее
                        <i class="fa fa-arrow-circle-right"></i>
                    </p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-xs-6">
            <a href="<?= Url::toRoute(['slider/']) ?>">
                <div class="small-box bg-yellow">

                    <div class="inner">
                        <h3>Слайдер</h3>
                        <p>(на главной странице)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sliders"></i>
                    </div>
                    <h3></h3>
                    <p class="small-box-footer">Подробнее
                        <i class="fa fa-arrow-circle-right"></i>
                    </p>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-xs-6">
            <a href="<?= Url::toRoute(['advice/']) ?>">
                <div class="small-box bg-red">

                    <div class="inner">
                        <h3>Статьи</h3>
                        <p>(советы / технологии)</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-newspaper-o"></i>
                    </div>
                    <h3></h3>
                    <p class="small-box-footer">Подробнее
                        <i class="fa fa-arrow-circle-right"></i>
                    </p>
                </div>
            </a>
        </div>

    </div>

</div>
<h1><? $avatar = Yii::$app->user->identity->img_profil ?></h1>

<section class="col-lg-6 connectedSortable ui-sortable">
    <?= ChatRoom::widget([
        'url' => Url::to(['default/send-chat']),
        'userModel' => User::className(),
        'userField' => 'avatarImage',

//          'userField' => Yii::$app->user->identity->img_profil,

    ]); ?>
</section>

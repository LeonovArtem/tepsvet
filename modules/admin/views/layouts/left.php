<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <!--                <img src="-->
                <? //= $directoryAsset ?><!--/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>-->
                <img src="<?= Yii::$app->user->identity->img_profil; ?>" class="img-circle" alt="User Image"/>

            </div>
            <div class="pull-left info">

                <p><?= Yii::$app->user->identity->status->name ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> В сети</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Поиск..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    ['label' => 'Главная', 'icon' => 'home', 'url' => ['default/']],
                    ['label' => 'Лампы', 'icon' => 'lightbulb-o', 'url' => ['lamps/']],
                    ['label' => 'Каталог (PDF)', 'icon' => 'file-pdf-o', 'url' => ['catalog/']],
                    ['label' => 'Слайдер', 'icon' => 'sliders', 'url' => ['slider/']],
                    [
                        'label' => 'Статьи',
                        'icon' => 'newspaper-o',
                        'url' => ['/news'],
                        'items' => [
                            ['label' => 'Советы', 'icon' => 'comments-o', 'url' => ['advice/']],
                            ['label' => 'Технологии', 'icon' => 'wrench', 'url' => ['technologies/']],
                        ]
                    ],
                    ['label' => 'SEO', 'icon' => 'internet-explorer', 'url' => ['seo/']],
                    [
                        'label' => 'Пользователи',
                        'icon' => 'user-plus',
                        'url' => ['user/'],
                        'visible' => Yii::$app->user->identity->status->id == 1,
                    ],
                    [
                        'label' => 'Для разработчика',
                        'icon' => 'gears',
                        'url' => '#',
                        'visible' => Yii::$app->user->identity->status->id == 1,
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Отладка', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
                        ],
                    ],

                ],
            ]
        ) ?>

    </section>

</aside>

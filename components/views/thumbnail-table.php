<?php
use yii\bootstrap\Html;

?>
<?php if ($dataTable): ?>
    <div class="row text-center">
        <?php foreach ($dataTable as $countBtn => $table): ?>
            <?php
            //Для проверки на четность
            ++$countBtn;
            ?>
            <?php if ($table->status): ?>
                <div class="col-lg-<?= $countItems ?> col-md-<?= $countItems ?>">
                    <div class="media">
                        <a class="pull-left" href="<?= $table->file_puth_pdf ?>">
                            <?= Html::img($table->img); ?>
                        </a>
                        <div class="media-body text-center">
                            <h4 class="media-heading"><?= $table->name; ?></h4>
                            <p class="catalog-format">в формате PDF (<?= $table->file_size; ?> Мб)</p>
                            <div>
                                <?= Html::a('Посмотреть',
                                    Yii::getAlias($table->file_puth_pdf),
                                    ['class' => 'btn btn-' . ($countBtn % 2 ? 'primary' : 'info')]
                                );
                                ?>
                                <?= Html::a('Скачать', ['site/download-file',],
                                    [
                                        'class' => 'btn btn-' . ($countBtn % 2 ? 'info' : 'primary'),
                                        'data' => [
                                            'method' => 'post',
                                            'params' => [
                                                'id' => $table->id,
                                            ],
                                        ],
                                    ]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <hr>
<?php endif; ?>
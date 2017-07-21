<?php
use yii\bootstrap\Html;

?>
<?php if ($dataTable): ?>
    <?php foreach ($dataTable as $countBtn => $table): ?>
        <?php
        //Для проверки на четность
        ++$countBtn;
        ?>
        <?php if ($table->status): ?>
            <div class="thumbnail">
                <?= Html::img($table->img); ?>
                <div class="caption">
                    <h3><?= $table->name; ?></h3>
                    <h4>в формате PDF (<?= $table->file_size; ?> Мб)</h4>
                    <p>
                        <?= Html::a('Посмотреть', $table->file_puth_pdf,
                            ['class' => 'btn btn-' . ($countBtn % 2 ? 'primary' : 'info')]);
                        ?>
                        <?= Html::a('Скачать', $table->file_puth_pdf,
                            ['class' => 'btn btn-' . ($countBtn % 2 ? 'info' : 'primary')]);
                        ?>
                    </p>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>


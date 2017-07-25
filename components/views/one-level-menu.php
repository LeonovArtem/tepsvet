<?php
use yii\helpers\Html;

?>
<div class="list-group">
    <?php foreach ($sectionMenu as $section): ?>
        <?= Html::a('<i class="glyphicon glyphicon-chevron-right pull-right"></i>' . $section->head,
            ['', 'url' => $section->url],
            ['class' => $section->url == $urlActive ? 'list-group-item active' : 'list-group-item']); ?>
    <?php endforeach; ?>
</div>
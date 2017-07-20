<?php
use yii\helpers\Html;
?>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <div class="list-group">

            <a class="list-group-item" href="/web/site/high-tech">
                <i class="glyphicon glyphicon-chevron-right pull-right"></i>
                Model Generator
            </a>
        </div>
    </div>
    <div class="col-md-9 col-sm8">
        <?php foreach ($posts as $post): ?>
            <pre>
        <? print_r($post); ?>
    </pre>
        <?php endforeach; ?>
    </div>
</div>
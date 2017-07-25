<?php
use app\components\OneLevelMenuWidget;

?>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <?= OneLevelMenuWidget::widget([
            'urlActive' => $post->url,
            'sectionMenu' => $postMenu,
        ]) ?>
    </div>
    <div class="col-md-9 col-sm8">
        <?= $post->content; ?>
    </div>
</div>
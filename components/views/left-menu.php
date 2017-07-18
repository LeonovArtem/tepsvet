<?php
use yii\helpers\Html;

?>
<div class="list-group">
    <nav class="navmenu navmenu-warning" role="navigation">
        <ul class="nav navmenu-nav">
            <?php foreach ($sections as $level => $section): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?= $level; ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu navmenu-nav" role="menu">
                        <?php for ($i = 0, $n = count($section); $i < $n; $i++): ?>
                            <? foreach ($section[$i] as $href => $name): ?>
                                <li><?= Html::a($name, ['', $href => $name]) ?></li>
                            <? endforeach; ?>
                        <?php endfor; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>
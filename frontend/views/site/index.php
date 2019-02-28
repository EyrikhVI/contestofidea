<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!--    <div class="jumbotron">

        </div>-->

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <ul class="auroramenu auroramenu-default">
                    <?= \frontend\components\MenuWidget::widget(['tpl' => 'menu']) ?>
                </ul>
                <p></p>
            </div>
            <div class="col-lg-4">
                <?php if (!empty($competitions)): ?>
                <h2>Популярные конкурсы</h2>
                    <?php foreach ($competitions as $competition):?>
                    <?= $competition->name?>
                    <?= $competition->note?>
                    <?= $competition->start_date?>

                    <?php endforeach; ?>
                <?php endif;?>

            </div>
            <div class="col-lg-4">


            </div>
        </div>

    </div>
</div>

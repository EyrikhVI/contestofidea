<?php

/* @var $this yii\web\View */

//$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!--    <div class="jumbotron">

        </div>-->

    <div class="body-content">

        <div class="row">
            <div class="col-lg-3">
                <ul class="auroramenu auroramenu-default">
                    <?= \frontend\components\MenuWidget::widget(['tpl' => 'menu']) ?>
                </ul>
                <p></p>
            </div>
            <div class="col-lg-8">
                <?php if (!empty($competitions)): ?>
                <h2>Популярные конкурсы</h2>
                    <div class='row'>
                        <?php $idx=1?>
                    <?php foreach ($competitions as $competition):?>

                        <div class='col-md-3'>
                    <a href="<?= \yii\helpers\Url::to(['competition/view','id'=>$competition->id])?>"><?= $competition->name?></a><br>
                    <?= $competition->note?><br>
                    <?= $competition->start_date_competition?><br>
                    <?= $competition->application_start_date_competition?><br>
                    <?= $competition->application_end_date_competition?><br>
                    <?= $competition->end_date_competition?><br>
                    <?= $competition->created_at_competition?><br>
                    <?= $competition->updated_at_competition?><br>
                        </div>
                        <?php if ($idx%4===0):?></div><div class='row'><?php endif;?>
                        <?php $idx++?>
                    <?php endforeach; ?>
                    </div>
                <?php endif;?>

            </div>
            <div class="col-lg-4">


            </div>
        </div>

    </div>
</div>

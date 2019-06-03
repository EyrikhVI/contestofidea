<?php

/* @var $this yii\web\View */

//$this->title = 'My Yii Application';
use yii\helpers\Html;
use yii\helpers\Url;
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
                <div class="layout-buttons">
                    <span class="active icon icon-list"></span>
                    <span class="icon icon-table"></span>
                </div>
            </div>
            <div class="col-lg-9">
                <?php if (!empty($competitions)): ?>
                <h2 align="center"><?='<i class="fas fa-folder-open"></i>'.' '.$title?></h2>
                    <div class='row'>
                    <?php $idx=1?>
                    <?php foreach ($competitions as $competition):?>

                        <div class='col-lg-4'>
                            <div class="competition">
                            <div class="competition-title">
                    <a href="<?= Url::to(['competition/view','id'=>$competition->id])?>"><?= $competition->name?></a></div>
                    <?php if (!empty($competition->logo)): ?>
                    <div class="competition-img"><?= Html::img('@web/uploads/' . $competition->logo, ['alt' => 'Логотип']);?></div>
                    <?php endif;?>
                    <?= $competition->user->last_name.' '.$competition->user->first_name.' '.$competition->user->patronymic?>

                    <div class="competition-desc"><?= $competition->note?></div>
                    <div class="competition-desc"><?= $competition->conditions?></div>
                    <div class="competition-date">Период проведения:<br><?= $competition->start_date_competition.'-'.$competition->end_date_competition?><br>
                    Период приема заявок:<br><?= $competition->application_start_date_competition.'-'.$competition->application_end_date_competition?><br>
                    Создан <?= $competition->created_at_competition?><br>Изменен <?= $competition->updated_at_competition?><br>
                    </div>
                        </div>
                        </div>
                        <?php if ($idx%3===0):?></div><div class='row'><?php endif;?>
                        <?php $idx++?>
                    <?php endforeach; ?>
                    </div>
                <?php if (!empty($pages)): ?><div align="center"><?php echo yii\widgets\LinkPager::widget([
                            'pagination' => $pages,
                        ]);?></div><?php endif;?>
                <?php endif;?>

            </div>
            <div class="col-lg-4">


            </div>
        </div>

    </div>
</div>

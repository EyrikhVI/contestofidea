<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 04.03.2019 21:19
 */
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
                </div>
                <div class="col-lg-9">
                    <?php if (!empty($competitions)): ?>
                        <h2 align="center"><i class="fas fa-folder-open"></i><?= $category->name ?></h2>
                        <div class='row'>
                        <?php $idx=1?>
                        <?php foreach ($competitions as $competition):?>

                            <div class='col-lg-4'>
                                <div class="competition">
                                    <div class="competition-title">
                                        <a href="<?= Url::to(['competition/view','id'=>$competition->id])?>"><?= $competition->name?></a></div>
                                    <?php if (!empty($competition->logo)): ?>
                                        <div class="competition-img"><?= Html::img(Yii::$app->params['CompetitionFileURL'] . $competition->id . '/'. $competition->logo, ['alt' => 'Логотип']);?></div>
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
                        <div align="center"><?php echo yii\widgets\LinkPager::widget([
                             'pagination' => $pages,
                        ]);?></div>
                        <?php else:?>
                    <h2 align="center">Данная категория пуста...</h2>
                    <?php endif;?>

                </div>
                <div class="col-lg-3">


                </div>
            </div>

        </div>
    </div>
<?php

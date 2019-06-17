<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 23.05.2019 11:22
 */
use yii\helpers\Url;
use yii\helpers\Html;
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
                    <?php if (!empty($competition)): ?>
                        <div class='row'>

                            <div class='col-lg-12'>

                                <div class="competitionview">
                                    <div class="competitionview-title"><?= $competition->name?></a></div>

                                     <i class="fas fa-folder-open"></i> Категория конкурса: <?=$competition->category->name?>
                                     <i class="fas fa-user"></i> Организатор: <?=$competition->user->last_name.' '.$competition->user->first_name.' '.$competition->user->patronymic?>
                                     <?php if (!empty($competition->inform_letter)): ?>
                                     <i class="fas fa-envelope"></i><?= Html::a(' Информационное письмо',Url::to(Yii::$app->params['CompetitionFileURL'] . $competition->id . '/'. $competition->inform_letter))?>
                                    <?php endif;?>
                                    <div class="competitionview-desc"><?= $competition->note?></div>
                                    <?php if (!empty($competition->logo)): ?>
                                        <div class="competitionview-img"><?= Html::img(Yii::$app->params['CompetitionFileURL'] . $competition->id . '/'. $competition->logo, ['alt' => 'Логотип']);?></div>
                                    <?php endif;?>

                                    <div class="competitionview-desc"><?= $competition->conditions?></div>
                                    <div class="competitionview-date">Просмотров: <span class="badge"><?=$competition->views_for_competition?></span> Подано заявок: <span class="badge"><?=$applications?></span><br> Период проведения:<br>
                                                <?= $competition->start_date_competition.'-'.$competition->end_date_competition?><br>
                                        Период приема заявок:<br><?= $competition->application_start_date_competition.'-'.$competition->application_end_date_competition?><br>
                                        Создан <?= $competition->created_at_competition?><br>Изменен <?= $competition->updated_at_competition?><br></div>
                                        <div class="competitionview-date"><?= Html::a('<i class="fas fa-edit"></i>'.' Изменить', Url::to(['competition/update','id'=>$competition->id]),
                                                ['class'=> Yii::$app->user->identity->id!=$competition->user->id?'btn btn-primary disabled':'btn btn-primary']) ?>
                                            <?= Html::a('<i class="far fa-file-pdf"></i>'.' Положение', Url::to(Yii::$app->params['CompetitionFileURL'] . $competition->id . '/'. $competition->conditions_file),
                                                ['class'=> empty($competition->conditions_file)?'btn btn-primary disabled':'btn btn-primary']) ?>
                                            <?php if (!Yii::$app->user->isGuest): ?> <?=Html::a('<i class="far fa-file-alt"></i>'.' Участвовать', Url::to(['application/create','id'=>$competition->id]),
                                            ['class'=> !(Yii::$app->user->getIdentity()->isParticipant()or Yii::$app->user->getIdentity()->isAdmin())?'btn btn-primary disabled':'btn btn-primary']) ?>
                                            <?php endif;?>
                                        </div>



                                </div>
                            </div>

                        </div>

                    <?php else:?>
                        <h2 align="center">Данная категория пуста...</h2>
                    <?php endif;?>
                </div>
            </div>

        </div>
    </div>
<?php ?>

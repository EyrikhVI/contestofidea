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
                                    <p class="competitionview-title"><?= $competition->name?></a></p>
                                    <div class='col-lg-6'>
                                    <?='Категория конкурса: '.$competition->category->name?>
                                    <?= 'Организатор:'.$competition->user->last_name.' '.$competition->user->first_name.' '.$competition->user->patronymic?>

                                    <p class="competitionview-desc"><?= $competition->note?></p>

                                    <p class="competitionview-date">Период проведения:<br><?= $competition->start_date_competition.'-'.$competition->end_date_competition?><br>
                                        Период приема заявок:<br><?= $competition->application_start_date_competition.'-'.$competition->application_end_date_competition?><br>
                                        Создан <?= $competition->created_at_competition?><br>Изменен <?= $competition->updated_at_competition?><br></p>
                                        <p class="competitionview-date"><?= Html::a('<i class="fas fa-edit"></i>'.' Изменить', Url::to(['competition/update','id'=>$competition->id]),
                                                ['class'=> Yii::$app->user->identity->id!=$competition->user->id?'btn btn-primary disabled':'btn btn-primary']) ?>
                                        </p>
                                    </div>
                                    <div class='col-lg-6'>
                                        <p class="competitionview-desc"><?= $competition->conditions?></p>
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

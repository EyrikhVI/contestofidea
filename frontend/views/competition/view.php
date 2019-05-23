<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 23.05.2019 11:22
 */
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

                                    <?= $competition->user->last_name.' '.$competition->user->first_name.' '.$competition->user->patronymic?>

                                    <p class="competition-desc"><?= $competition->note?></p>

                                    <p class="competitionview-date">Период проведения:<br><?= $competition->start_date_competition.'-'.$competition->end_date_competition?><br>
                                        Период приема заявок:<br><?= $competition->application_start_date_competition.'-'.$competition->application_end_date_competition?><br>
                                        Создан <?= $competition->created_at_competition?><br>Изменен <?= $competition->updated_at_competition?><br>
                                    </p>
                                    </div>
                                    <div class='col-lg-6'>
                                        <p>';lll'</p>
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

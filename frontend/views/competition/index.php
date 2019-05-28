<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CompetitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Competitions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competition-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Competition', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'category_id',
            'name',
            'note',
            //'conditions_file',
            //'conditions',
            //'inform_letter',
            //'start_date',
            //'application_start_date',
            //'application_end_date',
            //'end_date',
            //'application_for_participant',
            //'application_for_competition',
            //'views_for_competition',
            //'status',
            //'created_at',
            //'updated_at',
            //'link_info_letter',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

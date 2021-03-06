<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CriterionOperationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Критерии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterion-operation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать критерий', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:100px'],
            ],

            [
                'attribute' => 'name',
                'value'=>'competition.name',
            ],
            'name',
            [
                'attribute' => 'rate',
                'headerOptions' => ['style' => 'width:100px'],
            ],

            [
                'attribute' => 'max_ratig',
                'headerOptions' => ['style' => 'width:100px'],
            ],



            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

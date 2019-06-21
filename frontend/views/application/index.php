<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?/*= Html::a('Create Application', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width:100px'],
            ],
//            'id_user',
            'name',
            'note',
            'file',
/*            [
            'attribute' => 'Наименование конкурса',
            'value'=>'competition.name',
            ],*/

            'status',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {rate}',
                'buttons' => [
                    'rate' => function ($url,$model,$key) {
                        return Html::a('<span class="glyphicon glyphicon-star-empty"></span>', ['expertise/create', 'id'=>$model->id],['title'=>'Оценить заявку']);
                    },
                ],
            ],
        ],
    ]); ?>
</div>

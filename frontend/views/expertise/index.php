<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ExpertiseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Экспертизы заявок';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expertise-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>
        <?/*= Html::a('Create Expertise', ['create'], ['class' => 'btn btn-success']) */?>
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

            [
                'label' => 'Наименование конкурса',
                'value'=>'competition.name',
            ],
            [
                'label' => 'Наименование заявки',
                'value'=>'application.name',
            ],
            [
                'label' => 'Пользователь',
                'format' => 'html',
                'value' => function ($model) {
                    /** @var \common\models\User $model */
                    return \common\models\User::findOne($model->id_user)->getFullName();
                }
            ],
            [
                'label' => 'Наименование номинации',
                'value'=>'nomination.name',
            ],
            [
                'label' => 'Наименование критерия',
                'value'=>'criterion.name',
            ],
            [
                'attribute' => 'rate',
                'headerOptions' => ['style' => 'width:50px'],
            ],
            'note',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}']
        ],
    ]); ?>
</div>

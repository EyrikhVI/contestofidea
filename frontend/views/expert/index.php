<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ExpertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Эксперты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Назначить эксперта', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'Наименование конкурса',
                'value'=>'competition.name',
            ],

           [
                'attribute' => 'Пользователь',
                'format' => 'html',
                'value' => function ($model) {
                    /** @var \common\models\User $model */
                    return \common\models\User::findOne($model->id_user)->getFullName();
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

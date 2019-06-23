<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\Expertise;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Оценки конкурса';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expertises-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
                'label' => 'Итоговая оценка',
                'value'=>'total_rate',
                'headerOptions' => ['style' => 'width:50px'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '',

            ],
        ],
    ]); ?>
</div>

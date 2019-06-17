<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpertOperation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Эксперты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-operation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           'id',
            [
                'label'=>'Наименование конкурса',
                'value'=>\frontend\models\Competition::findOne($model->id_competition)->name,
            ],

            [
                'attribute' => 'Пользователь',
                'format' => 'html',
                'value' => function ($model) {
                    /** @var \common\models\User $model */
                    return \common\models\User::findOne($model->id_user)->getFullName();
                }
            ]


        ],
    ]) ?>

</div>

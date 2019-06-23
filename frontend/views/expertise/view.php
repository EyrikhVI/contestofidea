<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Expertise */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Экспертизы заявок', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expertise-view">

<!--    <h1><?/*= Html::encode($this->title) */?></h1>

    <p>
        <?/*= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */?>
        <?/*= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить запись??',
                'method' => 'post',
            ],
        ]) */?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',

            [
                'label'=>'Наименование конкурса',
                'value'=>\frontend\models\Competition::findOne($model->id_competition)->name,
            ],

            [
                'label'=>'Наименование аявки',
                'value'=>\frontend\models\Application::findOne($model->id_application)->name,
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
                'label'=>'Наименование номинации',
                'value'=>\frontend\models\Nomination::findOne($model->id_nomination)->name,
            ],

            [
                'label'=>'Наименование критерия',
                'value'=>\frontend\models\Criterion::findOne($model->id_criterion)->name,
            ],

            'note',
            'rate',
        ],
    ]) ?>

</div>

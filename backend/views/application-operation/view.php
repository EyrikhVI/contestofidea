<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ApplicationOperation */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявки на конкурс', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-operation-view">

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

            'name',
            'note',
            'file',
            'status',
//            'created_at',
            [
                'attribute' => 'created_at',
                'format' =>  ['date', 'php:d-m-Y H:i:s'],
                'options' => ['width' => '200']
            ],
//            'updated_at',
            [
                'attribute' => 'updated_at',
                'format' =>  ['date', 'php:d-m-Y H:i:s'],
                'options' => ['width' => '200']
            ],
        ],
    ]) ?>

</div>

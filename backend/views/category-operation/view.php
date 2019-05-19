<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoryOperation */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Справочник категорий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-operation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы дествительно хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
/*            'parent_id',*/
            [
            'attribute'=>'parent_id',
            'value'=>$model->category->name?$model->category->name:'-',
            ],
            'name',
            'keyword',
            'description',
        ],
    ]) ?>

</div>

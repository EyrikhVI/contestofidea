<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoryOperationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Справочник категорий';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-operation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
/*            'parent_id',*/
            [
            'attribute'=>'parent_id',
            'value'=>function($data){
                return $data->category->name?$data->category->name:'-';
                }
            ],
            'keyword',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Criterion */

$this->title = 'Изменить критерий: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Критерии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="criterion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'id_competition'=>$competition->id,
    ]) ?>

</div>

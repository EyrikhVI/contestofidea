<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Expertise */

$this->title = 'Update Expertise: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Expertises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expertise-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

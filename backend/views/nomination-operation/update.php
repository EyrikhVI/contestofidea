<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NominationOperation */

$this->title = 'Изменить номинацию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Номинации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="nomination-operation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'competition'=>$competition,
    ]) ?>

</div>

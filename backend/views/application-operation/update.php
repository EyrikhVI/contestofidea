<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ApplicationOperation */

$this->title = 'Изменить заявку на конкурс: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="application-operation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'user'=>$user,'competition'=>$competition
    ]) ?>

</div>

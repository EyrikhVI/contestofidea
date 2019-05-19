<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserOperation */

$this->title = 'Изменить данные пользователя: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Справочник пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить данные';
?>
<div class="user-operation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

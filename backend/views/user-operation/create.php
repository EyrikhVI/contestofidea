<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserOperation */

$this->title = 'Создать пользователя';
$this->params['breadcrumbs'][] = ['label' => 'Справочник пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-operation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

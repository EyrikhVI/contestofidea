<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Application */

$this->title = 'Изменить заявку: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="application-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3><?=$competition->name?></h3>
    <?= $this->render('_form', [
        'model' => $model, 'user'=>$user,'competition'=>$competition,'applications'=>$applications,'pages'=>$pages
    ]) ?>

</div>

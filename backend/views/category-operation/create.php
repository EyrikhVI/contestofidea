<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CategoryOperation */

$this->title = 'Создать категорию';
$this->params['breadcrumbs'][] = ['label' => 'Справочник категорий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-operation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

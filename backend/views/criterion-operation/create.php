<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CriterionOperation */

$this->title = 'Создать критерий';
$this->params['breadcrumbs'][] = ['label' => 'Критерии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterion-operation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'competition'=>$competition,
    ]) ?>

</div>

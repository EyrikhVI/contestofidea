<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ApplicationOperation */

$this->title = 'Create Application Operation';
$this->params['breadcrumbs'][] = ['label' => 'Application Operations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-operation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

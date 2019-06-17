<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ExpertOperation */

$this->title = 'Назначить эксперта';
$this->params['breadcrumbs'][] = ['label' => 'Эксперты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-operation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'competition'=>$competition, 'usermap'=>$usermap,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NominationOperation */

$this->title = 'Создать номинацию';
$this->params['breadcrumbs'][] = ['label' => 'Номинации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomination-operation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'competition'=>$competition,
    ]) ?>

</div>

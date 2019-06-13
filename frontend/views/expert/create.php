<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Expert */

$this->title = 'Назначить эксперта';
$this->params['breadcrumbs'][] = ['label' => 'Эксперты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expert-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 'id_competition'=>$competition->id, 'usermap'=>$usermap,
    ]) ?>

</div>

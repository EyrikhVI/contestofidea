<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Criterion */
/* @var $competition frontend\models\Competition */
$this->title = 'Создать критерий';
$this->params['breadcrumbs'][] = ['label' => 'Критерии', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'id_competition'=>$competition->id,
    ]) ?>

</div>

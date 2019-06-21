<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Expertise */

$this->title = 'Create Expertise';
$this->params['breadcrumbs'][] = ['label' => 'Expertises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expertise-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'expertises' => $expertises, 'application'=>$application,'competition'=>$competition,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Nomination */

/*$this->title = 'Создать номинацию';
$this->params['breadcrumbs'][] = ['label' => 'Номинации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="nomination-create">

<!--    <h1><?/*= Html::encode($this->title) */?></h1>
    <h3><?/*=$competition->name*/?></h3>-->

    <?= $this->render('nomination_form', [
        'model_nomination' => $model_nomination, 'id_competition'=>$competition->id,
    ]) ?>

</div>

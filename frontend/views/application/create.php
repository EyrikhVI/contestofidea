<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Application */
/* @var $competition frontend\models\Application */
/* @var $applications frontend\models\Application */

$this->title = 'Заявка на конкурс';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3><?=$competition->name?></h3>
    <?= $this->render('_form', [
        'model' => $model, 'user'=>$user,'applications'=>$applications,'competition'=>$competition,
        'pages'=>$pages,'count_application'=>$count_application,
    ]) ?>

</div>

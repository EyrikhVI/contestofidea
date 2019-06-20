<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ApplicationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-index">

    <?php foreach ($applications as $application):?>
        <h3><?=$application->id?><?=$application->name?><?=$application->competition->name?><?=$application->nomination->name?></h3>
    <?php endforeach; ?>
</div>

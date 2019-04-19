<?php

use frontend\components\Pagesbar;


if( Yii::$app->controller->id=='content') {
    echo Pagesbar::widget();
}
?>
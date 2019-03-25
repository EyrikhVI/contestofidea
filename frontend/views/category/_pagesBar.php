/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 25.03.2019 21:23
 */
<?php

use common\widgets\Pagesbar;


if( Yii::$app->controller->id=='content') {
    echo Pagesbar::widget();
}
?>
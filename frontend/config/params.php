<?php
return [
    'adminEmail' => 'admin@example.com',
    'UploadAvatar' => '@web/uploads/avatar/', // путь хранения файлов изображений аватаров
    'NoImageAvatar'=>'no_photo_available.jpg', //Имя файла изображения пустого аватара
    Yii::setAlias('themes',dirname(dirname(dirname(__DIR__))).'/themes'),
    Yii::setAlias('menaBase',dirname(dirname(__DIR__))),
    Yii::setAlias('menaThemes',dirname(dirname(dirname(__DIR__))).'/themes'),
/*    Yii::setAlias('common', dirname(__DIR__)),
    Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend'),
    Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend'),
    Yii::setAlias('menacore',dirname(dirname(__DIR__))),
    Yii::setAlias('menaBase',dirname(dirname(dirname(__DIR__)))),
    Yii::setAlias('menaThemes',dirname(dirname(dirname(__DIR__))).'/themes'),
    Yii::setAlias('upload',dirname(dirname(dirname(__DIR__))).'/upload'),
    Yii::setAlias('themes',dirname(dirname(dirname(__DIR__))).'/themes'),
    Yii::setAlias('blocks',dirname(dirname(dirname(__DIR__))).'/blocks'),
    Yii::setAlias('menaBasePublic',substr(str_replace('\\', '/', realpath(dirname(dirname(dirname(__DIR__))))), strlen(str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']))))),*/

];

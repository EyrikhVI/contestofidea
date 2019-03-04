<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 04.03.2019 20:43
 */
//Общий контролер приложения, от которого будут наследоваться
//другие контролеры
namespace frontend\controllers;

use yii\web\Controller;

class AppController extends Controller
{
    public function setMeta($title=null,$keywords=null,$description=null){
    $this->view->title=$title;
    $this->view->registerMetaTag(['name'=>'keywords','content'=>"$keywords"]);
    $this->view->registerMetaTag(['name'=>'description','content'=>"$description"]);

    }
}
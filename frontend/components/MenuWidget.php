<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 17.02.2019 22:25
 */

namespace frontend\components;
use yii\base\Widget;
use yii;
use frontend\models\Category;
class MenuWidget extends Widget
{
    public $tpl;//Вид шаблона - меню, select-список
    public $data;//Массив категорий
    public $tree;//Массив сформированного дерева
    public $menuHtml;//Сформированный код меню
    //Инициализация, присвоение значений по умолчанию
    public function init()
    {
        //Инициализация родительского метода
        parent::init();
        if ($this->tpl===null){
            $this->tpl='menu';//по умолчанию - меню
        }
        $this->tpl.='.php';
    }

    //Выполнение, запуск виджета
    public function run()
    {
        //Получить кэш меню, если он есть
        $menu=Yii::$app->cache->get('menu_category');
        if ($menu) return $menu;
        //Из БД таблицы category извлекаем все записи, индексируем и заполняем массив
        $this->data=Category::find()->indexBy('id')->asArray()->all();
        $this->tree=$this->getTree();//Строим дерево для меню
        $this->menuHtml=$this->getMenuHtml($this->tree);//По дереву генерим код для вывода меню
        //Сохранить кэш меню
        Yii::$app->cache->set('menu_category',$this->menuHtml,60*60);
        return $this->menuHtml;
    }
    protected function getTree(){
        $tree=[];
        foreach ($this->data as $id=>&$node){
            if (!$node['parent_id'])
                $tree[$id]=&$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']]=&$node;
        }
    return $tree;
    }
    protected function getMenuHtml($tree){
        $str='';
        foreach ($tree as $category){
            $str.=$this->catToTemplate($category);
        }
        return $str;
    }
    protected function catTotemplate($category){
        ob_start();//Буферизируем вывод, для снижения нагрузки
        //Вставляем html код вывода меню
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}
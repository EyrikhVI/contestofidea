<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 25.03.2019 21:39
 */
namespace common\components;
use yii;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\HttpException;
use yii\helpers\FileHelper;
use yii\imagine\Image;


class Html extends yii\helpers\Html
{


    /**
     * Generates a html img tag.
     * @param array|string $src
     * @param bool $responsive
     * @param array $options
     * @return string
     */
    public static function img($src, $options = [], $responsive = true)
    {

        if(trim($src)==false)
            return $src;


        if (isset($options['thumbnail'])) {
            $w = null;
            $h = null;

            if (isset($options['thumbnail']['width'])) {
                $w = $options['thumbnail']['width'];
            }

            if (isset($options['thumbnail']['height'])) {
                $h = $options['thumbnail']['height'];
            }

            unset($options['thumbnail']);

            if (is_null($w) && is_null($h))
                throw new HttpException(500, "Width or height is required when using thumbnail generation");

            $src = self::thumbnail($src, $w, $h);

        }

        if ($responsive) {
            $rClass = Yii::$app->controller->config['_BOOTSTRAP4_'] ? "fluid" : "responsive";
            if (isset($options['class'])) {
                $options['class'] .= ' img img-' . $rClass;
            } else {
                $options['class'] = 'img img-' . $rClass;
            }

        }

        return parent::img($src, $options);

    }

    public static function thumbnail($file, $width, $height)
    {
        if (trim($file) == false)
            return $file;

        if (!Url::isRelative($file))
            return $file;

        $thumbsFolder = "thumbs/i/";
        $filePieces = pathinfo($file);

        //Png thumbnail is disabled due to some wrong results with 24bit pngs
        if (in_array(strtolower($filePieces['extension']),['png','gif']))
            return $file;

        $newFilename = $filePieces['filename'] . "_" . $width . "_" . $height . ".jpg";
        $dir = FileHelper::normalizePath($filePieces['dirname']);
        $destDir = Yii::getAlias("@webroot/") . $thumbsFolder . $dir;
        $fullPath = $destDir . DIRECTORY_SEPARATOR . $newFilename;
        if(!file_exists($file)){
            return $file;
        }
        if (!file_exists($fullPath)) {
            if (FileHelper::createDirectory($destDir)) {
                Image::thumbnail($file, $width, $height)->save($fullPath);
            } else
                return $file;
        }

        return $thumbsFolder . $filePieces['dirname'] . DIRECTORY_SEPARATOR . $newFilename;

    }

    public static function elinkUrl($elink, $contentOnly = false)
    {
        $url = false;
        switch ($elink->type) {
            case "none":
                $url = false;
                break;
            case "page":
                //todo: If content does not exist yet disable link. Check whether to do this, here or in {@see frontend\components\ContentUrlRule::createUrl()}
//                if($page=Content::findOne($elink->page)){
//                    $options['href'] = Yii::$app->urlManager->createUrl(['content/view', 'id' => $elink->page,'link_rewrite'=>$page['langFields'][0]['link_rewrite']]);
//                }else
//                {
//                    return $text;
//                }
                $url = Yii::$app->urlManager->createUrl(['content/view', 'id' => $elink->page]);

                break;
            case "file":
            case "url":
                $url = Url::to($elink->url);
                break;


        }

        if ($contentOnly) {
            $url .= "?content-only=1";
        }


        return $url;
    }


    public static function elink($text, $elink, $options = [])
    {

        if (!isset($options['target']) && $elink->newpage == 1)
            $options['target'] = "_blank";


        if ($link = self::elinkUrl($elink)) {
            $options['href'] = $link;
        } else {

        }

        if ($elink->type != "none")
            return static::tag('a', $text, $options);
        return $text;
    }

    public static function fa($iconName, $options = [])
    {
        $options['class'] = isset($options['class']) ? $options['class'] . " fa fa-" . $iconName : "fa fa-" . $iconName;
        return Html::tag('i', "", $options);
    }

    public static function advancedIcon($id)
    {
        $iD = ucfirst($id);
        $i = Html::tag('i', '', ['class' => 'fa fa-circle', 'id' => $id . '-icon_selection']);
        $span = Html::tag('span', '', ['class' => 'caret']);
        $btn = Html::tag('span', $i . $span, ['class' => 'e' . $iD . 'IconSelect btn btn-default', 'onClick' => 'is.getProbox("' . $id . '")']);
        $hidden = Html::input('text', '', '', ['id' => $id . '_iconClass', 'class' => 'hidden']);
        return $btn . $hidden;
    }
}
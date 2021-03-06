<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 28.02.2019 22:10
 */

namespace common\behaviors;

use yii\behaviors\AttributeBehavior;
use yii\base\InvalidConfigException;


class DateToTimeBehavior extends AttributeBehavior {

    public $timeAttribute;
    public $format;//Формат отображения
    public function getValue($event) {

        if (empty($this->timeAttribute)) {
            throw new InvalidConfigException(
                'Can`t find "fromAttribute" property in ' . $this->owner->className()
            );
        }

        if (!empty($this->owner->{$this->attributes[$event->name]})) {
            $this->owner->{$this->timeAttribute} = strtotime(
                $this->owner->{$this->attributes[$event->name]}
            );

            return date($this->format, $this->owner->{$this->timeAttribute});
        } else if (!empty($this->owner->{$this->timeAttribute})
            && is_numeric($this->owner->{$this->timeAttribute})
        ) {
            $this->owner->{$this->attributes[$event->name]} = date(
                $this->format,
                $this->owner->{$this->timeAttribute}
            );

            return $this->owner->{$this->attributes[$event->name]};
        }

        return null;
    }
}
<?php

namespace modules;

use Craft;
use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    public function init()
    {
        Craft::setAlias('@modules', __DIR__);
        parent::init();

//        ray(Craft::$app->env);
    }

}

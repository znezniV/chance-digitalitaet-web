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

        // Defer most setup tasks until Craft is fully initialized
        Craft::$app->onInit(function () {
            $this->attachEventHandlers();
        });
    }

    public function attachEventHandlers(): void
    {
        // Override this method in your module class to attach event handlers
    }

}

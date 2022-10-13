<?php
namespace modules;

use Craft;
use craft\controllers\UsersController;
use craft\elements\User;
use craft\events\ElementEvent;
use craft\events\UserEvent;
use craft\services\Elements;
use yii\base\Event;

class MakeUsersEditors extends \yii\base\Module
{
    public function init()
    {
        Craft::setAlias('@modules', __DIR__);
        parent::init();

        Event::on(
            UsersController::class,
            UsersController::EVENT_AFTER_ASSIGN_GROUPS_AND_PERMISSIONS,
            static function(UserEvent $event) {
                Craft::$app->getUsers()->assignUserToGroups($event->user->id, [1]);
            }
        );
    }
}

<?php
namespace modules;

use Craft;
use craft\controllers\UsersController;
use craft\events\RegisterUrlRulesEvent;
use craft\events\UserEvent;
use craft\helpers\UrlHelper;
use craft\web\UrlManager;
use yii\base\Event;
use yii\base\Module;
use craft\base\Element;
use craft\events\RegisterPreviewTargetsEvent;

class SeoPreview extends Module
{
    public function init()
    {
        Craft::setAlias('@modules', __DIR__);
        parent::init();

        // Register preview target
        Event::on(
            Element::class,
            Element::EVENT_REGISTER_PREVIEW_TARGETS,
            static function(RegisterPreviewTargetsEvent $event){
                $element = $event->sender;
                if (!$element->getUrl()) {
                    return;
                }
                $event->previewTargets[] = [
                    'label' => Craft::t('app', 'SEO Preview'),
                    'url' => UrlHelper::siteUrl('seopreview/preview', [
                        'elementId' => $element->id,
                        'siteId' => $element->siteId,
                    ]),
                ];
            }
        );

        // Register preview site route
        $request = Craft::$app->getRequest();
        if ($request->getIsSiteRequest() && !$request->getIsConsoleRequest()) {
            Event::on(
                UrlManager::class,
                UrlManager::EVENT_REGISTER_SITE_URL_RULES,
                static function(RegisterUrlRulesEvent $event) {
                    $event->rules['seopreview/preview'] = ['template' => '_previews/seo'];
                }
            );
        }

    }
}

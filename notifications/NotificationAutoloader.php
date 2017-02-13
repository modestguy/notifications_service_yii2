<?php
namespace app\services\notifications;
use yii\di\Container;

class NotificationAutoloader {
    /**
     * @param Container $container
     */
    public static function init(Container $container) {
        $container->set('MailNotifier', 'app\services\notifications\models\MailNotifier');
        $container->set('NotificationService', 'app\services\notifications\models\NotificationService');
    }
}
<?php
namespace app\services\notifications\models;

use app\services\notifications\interfaces\INotificationListener;
use app\services\notifications\interfaces\INotifier;

/**
 * Слушатель "Оповещений"
 * Class NotificationListener
 * @package app\services\notifications\models
 */
class NotificationListener implements INotificationListener
{

    private $notifiers = [];

    public function getNotifiers()
    {
        return $this->notifiers;
    }

    /**
     * Оповещаем по всем нотификаторам
     */
    public function notify()
    {
        /** @var INotifier $notifier */
        foreach ($this->notifiers as $notifier) {
            $notifier->notify();
        }
    }

    public function pushNotifier(INotifier $notifier)
    {
        $notifier[(string)$notifier] = $notifier;
    }
}
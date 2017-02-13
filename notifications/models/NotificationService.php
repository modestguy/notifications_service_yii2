<?php
namespace app\services\notifications\models;

use app\services\notifications\interfaces\INotification;
use app\services\notifications\interfaces\INotifier;

/**
 * Сервис уведомлений
 * Class NotificationService
 * @package app\services\notifications\models
 */
class NotificationService
{
    private $notifiers = [];

    /**
     * Даём уведомлятор сервису (Mail, SMS-уведомлятор, VK-уведомлятор и т.д.)
     * @param INotifier $notifier
     */
    public function pushNotifier(INotifier $notifier) {
        $this->notifiers[] = $notifier;
    }

    /**
     * Уведомляем о конкретной нотификации
     * @param INotification $notification
     */
    public function notify(INotification $notification)
    {
        /** @var INotifier $notifier */
        foreach ($this->notifiers as $notifier)
        {
            $notifier->setNotification($notification);
            $notifier->notify();
        }
    }


}
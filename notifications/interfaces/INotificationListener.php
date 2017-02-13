<?php
namespace app\services\notifications\interfaces;

/**
 * Слушатель нотификаций
 * Interface INotificationListener
 * @package app\services\notifications\interfaces
 */
interface INotificationListener {
    public function pushNotifier(INotifier $notifier);
    public function getNotifiers();

    public function notify();
}
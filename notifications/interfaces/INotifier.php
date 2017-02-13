<?php
namespace app\services\notifications\interfaces;

/**
 * Interface INotifier
 * @package app\services\notifications\interfaces
 */
interface INotifier {
    public function setNotification(INotification $object);
    public function notify();
}
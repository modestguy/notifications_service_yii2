<?php
namespace app\services\notifications\models;
use app\services\notifications\interfaces\INotification;
use app\services\notifications\interfaces\INotifier;
use Yii;

/**
 * Класс нотификатор почты
 * Class MailNotifier
 * @package app\services\notifications\models
 */
class MailNotifier implements INotifier {

    /**
     * @var INotification
     */
    private $notification;

    /**
     * Установить нотификацию
     * @param INotification $object
     */
    public function setNotification(INotification $object)
    {
        $this->notification = $object;
    }

    public function notify()
    {
        Yii::$app->mailer->compose()
            ->setFrom($this->notification->getFrom())
            ->setTo($this->notification->getTo())
            ->setSubject($this->notification->getSubject())
            ->setHtmlBody($this->notification->getBody())
            ->send();
    }
}
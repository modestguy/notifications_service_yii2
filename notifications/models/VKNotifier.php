<?php
namespace app\services\notifications\models;

use app\services\notifications\interfaces\INotification;
use app\services\notifications\interfaces\INotifier;
use app\services\vk\interfaces\IVkApi;

/**
 * Уведомлялка на стене группы в контакте
 * Class VKNotifier
 * @package app\services\notifications\models
 */
class VKNotifier implements INotifier {
    /**
     * @var INotification
     */
    private $notification;

    /**
     * @var IVkApi
     */
    private $vkApi;

    /**
     * VKNotifier constructor.
     * @param IVkApi $vkApi
     */
    public function __construct(IVkApi $vkApi)
    {
        $this->vkApi = $vkApi;
    }

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
        $this->vkApi->callMethod('wall.post', [
            'message' => $this->notification->getBody(),
            'owner_id' => $this->vkApi->getOwnerId()
        ]);
    }
}
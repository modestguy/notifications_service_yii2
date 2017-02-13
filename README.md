**Сервис "Уведомления"** для Yii2

Установка:
скопировать папку notifications в @app/services/notifications

В файл web/index.php добавить код автолодинга:

    require(__DIR__ . '/../services/notifications/NotificationAutoloader.php');
    \app\services\notifications\NotificationAutoloader::init(\Yii::$container);

Сервис позволяет отправлять уведомлени для любой модели, главное, чтобы модель имплементировала
 интерфейс INotification и имела реализацию функций.

Например, у вас есть модель News (новость):
  
  class News extends ActiveRecord {
  }
  
Имплементим интерфейс и пишем реализацию функций:
  
    // наша модель 
    class News extends ActiveRecord implements INotification {
        
        // тело письма
        public function getBody()
        {
            return $this->news_data;
        }
    
        // от кого письмо 
        public function getFrom()
        {
            return $this->your_field;
        }
    
        // тема письма
        public function getSubject()
        {
            return 'Уведомление о новой новости';
        }
    
        // кому отправляем письмо
        public function getTo()
        {
            return 'test@test.com';
        }
  }

Далее необходимо в экшне любого контроллера получить сервис отсылки. 
Задать нотификатор и передать нашу модель.
 
         $newsInstance = new News();
         ...   
         /** @var NotificationService $notificationService */
         $notificationService = yii::$container->get('NotificationService');
         $notificationService->pushNotifier(yii::$container->get('MailNotifier'));
         $notificationService->notify($newsInstance);
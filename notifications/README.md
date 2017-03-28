**"Notifications" service** for Yii2 projects

Installation:
copy 'notifications' folder to @app/services/notifications

Add these lines to web/index.php:


    require(__DIR__ . '/../services/notifications/NotificationAutoloader.php');
    \app\services\notifications\NotificationAutoloader::init(\Yii::$container);

Service allows to send notifications for any model, but model must implements INotification
and have a realizations of all methods.

For example, we have a News model:
  
  class News extends ActiveRecord {
  }
  
Implements interface and write realization for all methods:
  
    // наша модель 
    class News extends ActiveRecord implements INotification {
        
        // mail body
        public function getBody()
        {
            return $this->news_data;
        }
    
        // from
        public function getFrom()
        {
            return $this->your_field;
        }
    
        // subject
        public function getSubject()
        {
            return 'Уведомление о новой новости';
        }
    
        // to
        public function getTo()
        {
            return 'test@test.com';
        }
  }

And than, we get notification service in any controller action. 
Setting notificator and send our model.

 
         $newsInstance = new News();
         ...   
         /** @var NotificationService $notificationService */
         $notificationService = yii::$container->get('NotificationService');
         $notificationService->pushNotifier(yii::$container->get('MailNotifier'));
         $notificationService->notify($newsInstance);
         
Enjoy! Sorry for my english.         
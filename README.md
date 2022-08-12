

## SMS Management Service Laravel Project
Send async SMS for user with RabbitMQ and DBJob :hourglass:

Event handler process with [spatie event sourcing](https://spatie.be/index.php/docs/laravel-event-sourcing/v7/introduction)


Set environment SMS drivers (ghasedak,farazsms):
```
DEFAULT_SMS_NOTIFY=ghasedak 

//Ghasedak
GHASEDAK_API_KEY=YourApiKey

//FarazSMS
FARAZSMS_USER=username
FARAZSMS_PASSWORD=password
FARAZSMS_FROMNUM=YourNumber
FARAZSMS_BASE_URL=http://ippanel.com/class/sms/wsdlservice/server.php?wsdl
```

Set environment rabbitmq:
```
//set parameter for rabbitmq
RABBITMQ_HOST=YourRabbitHost
RABBITMQ_PORT=5672
RABBITMQ_USER=UserRabbit
RABBITMQ_PASSWORD=PassRabbit
RABBITMQ_VHOST=UserVirtualHost
```

Use with Docker :
```
sail up -d 
sail composer up
sail artisan migrate --seed
sail artisan queue:work 
```


You can send your SMS in two ways: 

if used simple -> you can create object sms drives and call methods [to,message,send]
```
  $sms = new FarazSmsMessage();
  $sms->to('09123456789')->message('Hello World!')->send();
```
if used default notify laravel -> you can create object from user and call method new notify and use instance of SendSmsNotication
```
$userObj->notify(new SendSmsNotication('Hello World!'));
```

API endpoints :

<a href="https://insomnia.rest/run/?label=SMS%20Management%20Service&uri=https://github.com/leberman/SMS-Management/blob/main/tests/Insomnia_SMSManage_2022-08-12.json" target="_blank"><img src="https://insomnia.rest/images/run.svg" alt="Run in Insomnia"></a>








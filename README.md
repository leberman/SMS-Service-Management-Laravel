

## SMS Management Service Laravel Project
Send async SMS for user with RabbitMQ and DBJob :hourglass:

Event handler process with `spatie/laravel-event-sourcing`


Default SMS drivers (ghasedak,farazsms):
```
DEFAULT_SMS_NOTIFY=ghasedak 

//Ghasedak
GHASEDAK_API_KEY=YourApiKey

//FarazSMS
FARAZSMS_USER=username
FARAZSMS_PASSWORD=password
FARAZSMS_FROMNUM=YourNumber
FARAZSMS_BASE_URL=http://ippanel.com/class/sms/wsdlservice/server.php?wsdl

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
sail artisan migrate --seed
sail artisan queue:work 
```

Endpoints test api:

<a href="https://insomnia.rest/run/?label=SMS%20Management%20Service&uri=" target="_blank"><img src="https://insomnia.rest/images/run.svg" alt="Run in Insomnia"></a>








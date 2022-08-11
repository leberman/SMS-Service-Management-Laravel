<?php

declare(strict_types=1);

return [
    'default' => env('DEFAULT_SMS_NOTIFY', 'ghasedak'),

    'ghasedak' => [
        'ApiKey' => env('GHASEDAK_API_KEY', 'you api key')
    ],

    'farazsms' => [
        'username' => env('FARAZSMS_USER', 'username'),
        'password' => env('FARAZSMS_PASSWORD', 'password'),
        'fromNum' => env('FARAZSMS_FROMNUM', '786876786786'),
        'baseUrl' => env('FARAZSMS_BASE_URL', 'http://ippanel.com/class/sms/wsdlservice/server.php?wsdl')
    ],
];

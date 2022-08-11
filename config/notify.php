<?php

declare(strict_types=1);

return [
    'default' => env('DEFAULT_SMS_NOTIFY', 'ghasedak'),

    'ghasedak' => [
        'ApiKey' => env('GHASEDAK_API_KEY', '')
    ],

    'farazsms' => [
        'username' => env('FARAZSMS_USER', ''),
        'password' => env('FARAZSMS_PASSWORD', ''),
        'fromNum' => env('FARAZSMS_FROMNUM', '786876786786'),
        'baseUrl' => env('FARAZSMS_BASE_URL', 'http://ippanel.com/class/sms/wsdlservice/server.php?wsdl')
    ],
];

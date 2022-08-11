<?php

namespace Domains\User\Drivers\Sms;

use SoapClient;
use function config;

class FarazSmsMessage implements SmsDriverInterface
{
    protected string $to;
    protected array $messages;
    protected object $client;

    /**
     * FarazSms constructor.
     * @param array $messages
     */
    public function __construct(array $messages = [])
    {
        $this->messages = $messages;

        // From the config/notify.php file.
        $this->username = config('notify.farazsms.username');
        $this->password = config('notify.farazsms.password');
        $this->fromNum = config('notify.farazsms.fromNum');
        $this->baseUrl = config('notify.farazsms.baseUrl');
    }


    /**
     * set message
     * @param string $message
     */
    public function message(string $message = ''): self
    {
        $this->messages[] = $message;

        return $this;
    }

    /**
     * set number to send
     * @param int $to
     */
    public function to(int $to): self
    {
        $this->to = $to;

        return $this;
    }


    /**
     * send sms
     * @return mixed
     */
    public function send(): mixed
    {
        if (!$this->to || !count($this->messages)) {
            throw new \Exception('SMS Message not correct.');
        }

        try {
            $obj = @new SoapClient($this->baseUrl);
            return $obj->SendSMS($this->fromNum, $this->to, $this->messages[0], $this->username, $this->password, null, 'send');
        } catch (\Throwable $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

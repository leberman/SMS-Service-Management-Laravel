<?php


namespace Domains\Shared\Drivers\Sms;

use Ghasedak\GhasedakApi;
use function config;

class GhasedakSmsMessage implements SmsDriverInterface
{


    protected string $to;
    protected array $messages;

    /**
     * GhasedakSmsMessage constructor.
     * @param array $messages
     */
    public function __construct(array $messages = [])
    {
        $this->messages = $messages;

        // From the config/notify.php file.
        $this->baseUrl = config('notify.ghasedak.ApiKey');
    }

    public function message(string $message = ''): self
    {
        $this->messages[] = $message;

        return $this;
    }

    public function to(int $to): self
    {
        $this->to = $to;

        return $this;
    }

    public function send(): mixed
    {
        if (!$this->to || !count($this->messages)) {
            throw new \Exception('SMS Message not correct.');
        }

        try {
            $obj = new GhasedakApi($this->baseUrl);
            return $obj->SendSimple($this->to,$this->messages[0],null);
        } catch (\Throwable $e) {
            throw new \Exception($e->getMessage());
        }

    }
}

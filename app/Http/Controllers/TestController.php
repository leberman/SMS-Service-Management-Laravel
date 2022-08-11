<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Ghasedak\GhasedakApi;
use RicorocksDigitalAgency\Soap\Facades\Soap;
use Domains\User\Drivers\Sms\FarazSmsMessage;
use function PHPUnit\Framework\isNull;

//Drivers
//https://github.com/tzsk/sms
interface SmsInterface
{
    public function send($receptor, $message, $lineNumber);
}
class GhasedakSMS implements SmsInterface
{
    private static object|null $instance = null;
    private object $obj;

    private function __construct()
    {
        $this->obj = new GhasedakApi(config('notify.ghasedak.ApiKey'));
    }

    public static function getInstance(): GhasedakSMS
    {
        if (isNull(self::$instance)) {
            self::$instance = new GhasedakSMS();
        }

        return self::$instance;
    }

    public function getConnection(): object
    {
        return $this->obj;
    }

    public function send($message, $lineNumber, $receptor)
    {
        return $this->obj->SendSimple($message, $lineNumber, $receptor);
    }
}
class FarazSms implements SmsInterface
{
    private static object|null $instance = null;
    private object $obj;
    private string $username;
    private string $password;
    private string $fromNum;

    private function __construct()
    {
        $this->username = config('notify.farazsms.username');
        $this->password = config('notify.farazsms.password');
        $this->fromNum = config('notify.farazsms.fromNum');
        $this->obj = Soap::to('http://ippanel.com/class/sms/wsdlservice/server.php?wsdl');
    }

    public static function getInstance(): FarazSms
    {
        if (isNull(self::$instance)) {
            self::$instance = new FarazSms();
        }

        return self::$instance;
    }

    public function SendSimple()
    {
        $user = "";
        $pass = "";
        $fromNum = "";
        $toNum = ["9122000000","9210000000"];
        $messageContent = '';
        $op  = "send";
        $time = '';
        return $this->obj->SendSMS($this->fromNum, $toNum, $messageContent, $user, $pass, $time, $op);
    }

    public function send($receptor, $message, $lineNumber)
    {
        return $this->obj->SendSimple($receptor, $message, $lineNumber);
    }
}

abstract class WebApi
{
    abstract public function createNotify();

    public function assert($receptor, $message, $lineNumber)
    {
        $notify = $this->createNotify();
        return $notify->send($receptor, $message, $lineNumber);
    }
}
class GhasedakWebApi extends WebApi
{
    public function createNotify(): object
    {
        return GhasedakSMS::getInstance();
    }
}
class FarazWebApi extends WebApi
{
    public function createNotify(): FarazSms
    {
//        return new FarazSms();
    }
}


class TestController extends Controller
{
    public function test()
    {
        $message = "Hello, World!"; // message
        $lineNumber = null; // If you do not have a dedicated line, you must specify the line number
        $receptor = "09xxxxxxxxx"; // receptor
//
//        $n = GhasedakSMS::getInstance();
//        var_dump($n->getConnection()->SendSimple($receptor, $message, $lineNumber));

//        $meme = FarazSms::getInstance();
//        $b = $meme->getConnection();
//        var_dump($b);


        //$ne = new GhasedakWebApi();
        //var_dump($ne->assert($receptor, $message, $lineNumber));


//        $user = User::first();
//        $user->notify(new SendSmsNotication());

        // Or send a sms directly
        $sms = new FarazSmsMessage();
        // Replace with your telephone number :-)
        return $sms->to('09390905201')->message('Hello World.')->send();
    }
}

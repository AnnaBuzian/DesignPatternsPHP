<?php

namespace DesignPatterns\Creational\SimpleFactory\Tests;

use DesignPatterns\Creational\SimpleFactory\Email;
use DesignPatterns\Creational\SimpleFactory\SMS;
use DesignPatterns\Creational\SimpleFactory\NotifierFactory;
use PHPUnit\Framework\TestCase;

class NotifierFactoryTest extends TestCase
{
    public function testCreateSMS()
    {
        $sms = (new NotifierFactory())->createNotifier('SMS', '+380660000000');
        $this->assertInstanceOf(SMS::class, $sms);
    }


    public function testCreateEmail()
    {
        $email = (new NotifierFactory())->createNotifier('Email', 'test@gmail.com');
        $this->assertInstanceOf(Email::class, $email);
    }
}

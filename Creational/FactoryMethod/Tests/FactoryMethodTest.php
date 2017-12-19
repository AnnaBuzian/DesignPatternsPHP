<?php

namespace DesignPatterns\Creational\FactoryMethod\Tests;

use DesignPatterns\Creational\FactoryMethod\SMS;
use DesignPatterns\Creational\FactoryMethod\Email;
use DesignPatterns\Creational\FactoryMethod\Post;
use DesignPatterns\Creational\FactoryMethod\ElectronicNotifierFactory;
use DesignPatterns\Creational\FactoryMethod\CourierNotifierFactory;
use PHPUnit\Framework\TestCase;

class FactoryMethodTest extends TestCase
{
    public function testCreateSMS()
    {
        $result = ElectronicNotifierFactory::getNotifier("SMS", "+380660000000");
        $this->assertInstanceOf(SMS::class, $result);
    }


    public function testCreateEmail()
    {
        $email = ElectronicNotifierFactory::getNotifier('Email', 'test@gmail.com');
        $this->assertInstanceOf(Email::class, $email);
    }


    public function testCreatePost()
    {
        $email = CourierNotifierFactory::getNotifier('Post', '10 Abhazka Street, 49010');
        $this->assertInstanceOf(Post::class, $email);
    }
}

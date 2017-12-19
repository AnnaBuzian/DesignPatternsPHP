<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 19.12.2017
 * Time: 21:10
 */

namespace DesignPatterns\Creational\FactoryMethod;

use DesignPatterns\Creational\FactoryMethod\Notifier;

class Post extends Notifier
{

    /**
     * Проверка является ли введенный адрес
     * @return bool
     */
    public function validateTo(): bool
    {
        $address = explode(',', $this->to);

        if (count($address) !== 2) {
            return false;
        }

        return true;
    }


    /**
     * Отправка уведомления
     *
     * @return string
     * @throws \Exception
     */
    public function sendNotification(): string
    {
        if ($this->validateTo() === false) {
            throw new \Exception("Invalid address.");
        }

        return "This is a " . get_class($this) . " to " . $this->to . ".";
    }

}
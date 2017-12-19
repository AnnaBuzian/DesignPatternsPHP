<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 16.12.2017
 * Time: 18:55
 */

namespace DesignPatterns\Creational\FactoryMethod;


class SMS extends Notifier
{

    /**
     * Проверка является ли введенный адресат номером телефона
     * @return bool
     */
    public function validateTo(): bool
    {
        return boolval(preg_match("/^[\+0-9\-\(\)\s]*$/", $this->to));
    }


    /**
     * Отправка уведомления на номер телефона
     *
     * @return string
     * @throws \Exception
     */
    public function sendNotification(): string
    {
        if ($this->validateTo() === false) {
            throw new \Exception("Invalid phone number.");
        }

        return "This is a " . get_class($this) . " to " . $this->to . ".";
    }
}
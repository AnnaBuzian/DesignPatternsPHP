<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 16.12.2017
 * Time: 18:34
 */

namespace DesignPatterns\Creational\FactoryMethod;


class Email extends Notifier
{
    private $from;

    public function __construct($to, $from)
    {
        parent::__construct($to);

        if (isset($from)) {
            $this->from = $from;
        } else {
            $this->from = "Anonymus";
        }
    }

    /**
     * Проверка является ли введенный адресат адресом почты
     * @return bool
     */
    public function validateTo(): bool
    {
        return boolval(filter_var($this->to, FILTER_VALIDATE_EMAIL));
    }


    /**
     * Отправка уведомления на email
     *
     * @return string
     * @throws \Exception
     */
    public function sendNotification(): string
    {
        if ($this->validateTo() === false) {
            throw new \Exception("Invalid email address.");
        }

        return "This is a " . get_class($this) . " to " . $this->to . " from " . $this->from . ".";
    }
}
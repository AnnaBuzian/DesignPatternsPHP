<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 18.12.2017
 * Time: 23:30
 */

namespace DesignPatterns\Creational\SimpleFactory;


abstract class Notifier
{
    protected $to;


    public function __construct(string $to)
    {
        $this->to = $to;
    }


    abstract public function validateTo(): bool;


    abstract function sendNotification(): string;
}
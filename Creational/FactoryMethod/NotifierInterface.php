<?php

namespace DesignPatterns\Creational\FactoryMethod;

interface NotifierInterface
{
    /**
     * @param $notifier
     * @param $to
     * @return mixed
     */
    public static function getNotifier($notifier, $to, $from);
}
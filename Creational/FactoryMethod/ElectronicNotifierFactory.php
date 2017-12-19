<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 19.12.2017
 * Time: 21:06
 */

namespace DesignPatterns\Creational\FactoryMethod;


use DesignPatterns\Creational\FactoryMethod\NotifierInterface;

class ElectronicNotifierFactory implements NotifierInterface
{
    public static function getNotifier($notifier, $to, $from = null)
    {
        if (empty($notifier)) {
            throw new \Exception("No notifier passed.");
        }

        switch ($notifier) {
            case 'SMS':
                return new SMS($to);
                break;
            case 'Email':
                return new Email($to, $from);
                break;
            default:
                throw new \Exception("Notifier invalid.");
                break;
        }
    }
}
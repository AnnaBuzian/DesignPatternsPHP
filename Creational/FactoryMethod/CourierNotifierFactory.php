<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 19.12.2017
 * Time: 21:06
 */

namespace DesignPatterns\Creational\FactoryMethod;


use DesignPatterns\Creational\FactoryMethod\NotifierInterface;
use DesignPatterns\Creational\FactoryMethod\Post;

class CourierNotifierFactory implements NotifierInterface
{
    /**
     * @param $notifier
     * @param $to
     * @param null $from
     * @return Email|SMS
     * @throws \Exception
     */
    public static function getNotifier($notifier, $to, $from = null)
    {
        if (empty($notifier)) {
            throw new \Exception("No notifier passed.");
        }

        switch ($notifier) {
            case 'Post':
                return new Post($to);
                break;
            default:
                throw new \Exception("Notifier invalid.");
                break;
        }
    }
}
<?php

namespace DesignPatterns\Creational\FactoryMethod;

class NotifierFactory
{
    /**
     * @param $notifier
     * @param $to
     * @param null $from
     * @return Notifier
     * @throws \Exception
     */
    public function createNotifier($notifier, $to, $from = null): Notifier
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

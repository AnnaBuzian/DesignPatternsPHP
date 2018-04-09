<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 04.04.2018
 * Time: 19:41
 */

namespace DesignPatterns\Structural\Proxy;

/**
 * Interface BankingInterface
 * @package DesignPatterns\Structural\Proxy
 */
interface BankingInterface
{
    /**
     * Получения баланса
     * @param User $user
     * @return float
     */
    public function getBalance(User $user);

    /**
     * Пополнение
     * @param User $user
     * @param $amount
     * @return float
     */
    public function refill(User $user, $amount);

    /**
     * Выдача с карты
     * @param User $user
     * @param $amount
     * @return float
     */
    public function withdraw(User $user, $amount);

}
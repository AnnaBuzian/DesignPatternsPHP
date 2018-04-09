<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 04.04.2018
 * Time: 19:49
 */

namespace DesignPatterns\Structural\Proxy;


class CoreBanking implements BankingInterface
{
    /** @var string $bankGroup */
    public $bankGroup = "PB";

    /**
     * Получения баланса
     * @param User $user
     * @return float
     */
    public function getBalance(User $user)
    {
        return $user->account->getAmount();
    }

    /**
     * Пополнение
     * @param User $user
     * @param $amount
     * @return mixed
     */
    public function refill(User $user, $amount)
    {
        $currentAmount = $user->account->getAccountNumber();
        $currentAmount += $amount;
        $user->account->setAmount($currentAmount);

        return $user->account->getAccountNumber();
    }

    /**
     * Выдача с карты
     * @param User $user
     * @param $amount
     * @return mixed
     * @throws \Exception
     */
    public function withdraw(User $user, $amount)
    {
        $currentAmount = $user->account->getAmount();
        if($currentAmount >= $amount){
            $currentAmount -= $amount;
        }else{
              throw new \Exception("Your current balance is low, Please select a lower amount");
        }
        $user->account->setAmount($currentAmount);

        return $user->account->getAmount();
    }

}
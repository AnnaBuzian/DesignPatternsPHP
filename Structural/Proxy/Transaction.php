<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 09.04.2018
 * Time: 18:59
 */

namespace DesignPatterns\Structural\Proxy;


class Transaction
{

    /**
     * Отобразить информацию о клиентах банка
     * @param Bank $bank
     */
    public static function display(Bank $bank)
    {
        echo "List of Customers with details\n\n";

        /** @var User $user */
        foreach ($bank->userList as $user) {
            echo "Name: $user->name\n";
            echo "Email: $user->email\n";
            echo "Account: $user->account->getAccountNumber()\n";
            echo "ATM pin: $user->account->getCard()->getPin()\n";
            echo "Balance: $user->account->getAmount()\n\n";
            echo "-----------------------------------------------------------------------\n\n";
        }
    }


    /**
     * Выполнение транзакций
     * @param BankingInterface $bankingType
     * @param User $user
     */
    public static function executeTransactions(BankingInterface $bankingType, User $user)
    {
        if($bankingType instanceof Bank){
            echo "Transactions processing in On-Site Bank\n";
        }else{
            echo "Transactions processing in the ATM\n";
        }

        $bankingType->refill($user, 120);
        $bankingType->withdraw($user, 100);
        $bankingType->withdraw($user, 20);
    }
}
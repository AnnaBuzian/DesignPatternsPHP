<?php

/**
 * Class User
 */
class User
{
    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var string */
    public $pin;

    /** @var string */
    public $account;

    /** @var double */
    public $balance;

    /** @var string */
    public $currency;


    /**
     * User constructor.
     * @param $name
     * @param $email
     * @param $account
     * @param $pin
     * @param double $balance
     * @param $currency
     */
    public function __construct($name, $email, $account, $pin, $balance, $currency)
    {
        $this->name = $name;
        $this->email = $email;
        $this->account = $account;
        $this->pin = $pin;
        $this->balance = $balance;
        $this->currency = $currency;
    }

    /**
     * @param double $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

}

/**
 * Interface Bank
 */
interface BankInterface
{
    /**
     * Получения баланса
     * @param User $user
     * @return float
     */
    public function getBalance();

    /**
     * Выдача с карты
     * @param User $user
     * @param $amount
     * @return
     */
    public function withdrawCash($amount);

}

/**
 * Class Bank
 */
class Bank implements BankInterface
{
    /** @var User  */
    public $user;

    /**
     * Bank constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Получения баланса
     * @param User $user
     * @return string
     */
    public function getBalance()
    {
        echo "<p>Your balance: ".$this->user->balance."</p>";
    }

    /**
     * Выдача с карты
     * @param float $amount
     * @return bool|float
     */
    public function withdrawCash($amount)
    {
        $currentAmount = $this->user->balance;

        if($currentAmount >= $amount){
            $currentAmount -= $amount;
        }else{
            echo "<p>Your current balance is low, Please select a lower amount</p>";
            return false;
        }
        $this->user->setBalance($currentAmount);

        echo "<p>Выдача суммы ".$amount." из счета ".$this->user->account
            ." успешно выполнена.</p>";

        return $this->user->balance;
    }
}

/**
 * Class BankATM
 */
class BankATM implements BankInterface
{
    /** @var float */
    public $cash;

    /** @var User */
    public $user;

    /** @var Bank */
    private $bank;

    /**
     * BankATM constructor.
     * @param User $user
     * @param $atmId
     * @param $cash
     */
    public function __construct(User $user, $cash)
    {
        $this->user = $user;
        $this->cash = $cash;
    }

    /**
     * Аутентификация
     * @param $pin
     * @return bool
     */
    public function authenticate($pin)
    {
        if (!$this->getCashInMachine()) {
            return false;
        };

        if ($this->user->pin === $pin) {
            echo "<p>Успешно аутентифированы!</p>";
            $this->bank = new Bank($this->user);
            return true;
        } else {
            echo "<p>Ошибка аутентификации!</p>";
            return false;
        }
    }

    /**
     * Получения баланса
     * @return float
     */
    public function getBalance()
    {
        return $this->bank->getBalance();
    }

    /**
     * Выдача с карты
     * @param $amount
     * @return float
     */
    public function withdrawCash($amount)
    {
        if ($amount > $this->cash) {
            echo "<p>Можно снять: $this->cash</p>";
            return false;
        }

        return $this->bank->withdrawCash($amount);
    }

    /**
     * Получить сумму наличных в банкомате
     * @return bool|float
     */
    public function getCashInMachine()
    {
        if ($this->cash > 0) {
            return $this->cash;
        }

        echo "<p>Нет наличных в банкомате</p>";
        return false;
    }
}


$user1 = new User(
    'User1',
    'user1@gmail.com',
    '9999999',
    '1111',
    100.00,
    'UAH'
);
$user2 = new User(
    'User2',
    'user2@gmail.com',
    '9999999',
    '1211',
    1050.40,
    'UAH'
);

// Proxy
$bankATM = new BankATM($user1, 200);
$bankATM->authenticate('1234');
echo "================================================";
$bankATM->authenticate('1111');
$bankATM->getBalance();
$bankATM->withdrawCash(10);
$bankATM->getBalance();
echo "================================================";

$bankATM = new BankATM($user2, 0);
$bankATM->authenticate('1211');

echo "================================================";
$bankATM = new BankATM($user2, 1300);
$bankATM->authenticate('1211');
$bankATM->getBalance();
$bankATM->withdrawCash(80);
$bankATM->getBalance();
$bankATM->withdrawCash(300);
$bankATM->getBalance();
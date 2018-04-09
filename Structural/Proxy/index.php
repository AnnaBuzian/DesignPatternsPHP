<?php

class User
{
    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var Account */
    public $account;


    /**
     * User constructor.
     * @param $name
     * @param $email
     * @param $account
     */
    public function __construct($name, $email, Account $account)
    {
        $this->name = $name;
        $this->email = $email;
        $this->account = $account;
    }

}

class Account
{

    /** @var string */
    private $accountNumber;

    /** @var double */
    private $amount;

    /** @var ATMCard $card */
    private $card;

    /**
     * Account constructor.
     * @param $accountNumber
     * @param $pin
     * @param $cardNumber
     */
    public function __construct($accountNumber, $pin, $cardNumber){
        $this->accountNumber = $accountNumber;
        $this->amount = 0.0;
        $this->card  = new ATMCard($accountNumber, $pin, $cardNumber);
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     */
    public function setAccountNumber(string $accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param double $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return ATMCard
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param ATMCard $card
     */
    public function setCard(ATMCard $card)
    {
        $this->card = $card;
    }

}

class ATMCard
{
    /** @var string */
    private $pin;

    /** @var string - счет */
    private $accountNumber;

    /** @var string $cardNumber */
    private $cardNumber;

    /**
     * ATMCard constructor.
     * @param string $accountNumber
     * @param string $pin
     * @param string $cardNumber
     */
    public function __construct($accountNumber, $pin, $cardNumber){
        $this->pin = $pin;
        $this->accountNumber = $accountNumber;
        $this->cardNumber = $cardNumber;
    }

    /**
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @param string $pin
     */
    public function setPin(string $pin)
    {
        $this->pin = $pin;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param string $accountNumber
     */
    public function setAccountNumber(string $accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     */
    public function setCardNumber(string $cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

}

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
        $currentAmount = $user->account->getAmount();
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

class Bank extends CoreBanking
{
    /** @var string */
    public $branchCode;

    /** @var array  */
    public $userList = [];

    /** @var int  */
    protected $_accountNumberCounter = 12345;
    /** @var int */
    protected $_pinCount = 1111;
    /** @var int */
    protected $_cardCount = 9999999;


    /**
     * Bank constructor.
     * @param $branch
     */
    public function __construct($branch)
    {
        $this->branchCode = $branch;
        $this->addUser("User1", "user1@mail.com");
        $this->addUser("User2", "user2@mail.com");
    }

    /**
     * Добавление пользователей
     * @param $name
     * @param $email
     */
    public function addUser($name, $email)
    {
        $account = new Account(
            $this->_accountNumberCounter++,
            (string)$this->_pinCount++,
            (string)$this->_cardCount++
        );
        $user = new User($name, $email, $account);
        array_push($this->userList, $user);
    }

}

class BankATM extends CoreBanking
{
    /** @var string */
    public $atmId;


    /**
     * BankATM constructor.
     * @param $atmId
     */
    public function __construct($atmId)
    {
        $this->atmId = $atmId;
    }

}

class Transaction
{

    /**
     * Выполнение транзакций по счету
     * @param Bank $bank
     * @param $account
     */
    public static function executeTransactionsByAccount(Bank $bank, $account)
    {
        /** @var User $user */
        foreach ($bank->userList as $user){
            if (strcasecmp($user->account->getAccountNumber(), $account) == 0) {
                echo "Welcome! $user->name in branch  $bank->branchCode of $bank->bankGroup",
                    " Group of Banking<br/>";
                self::executeTransactions($bank, $user);
                self::display($bank);
                return;
            }
        }

        echo "Wrong account entered";
    }

    /**
     * Выполнение транзакций по ПИНу
     * @param Bank $bank
     * @param BankATM $bankATM
     * @param $pin
     */
    public static function executeTransactionsByPin(Bank $bank, BankATM $bankATM, $pin)
    {
        /** @var User $user */
        foreach ($bank->userList as $user){
            if ($pin === $user->account->getCard()->getPin()) {
                echo "Welcome! $user->name in ATM $bankATM->atmId of $bank->bankGroup",
                    " Group of Banking<br/>";
                self::executeTransactions($bankATM, $user);
                self::display($bank);
                return;
            }
        }

        echo "Wrong PIN entered";
    }

    /**
     * Отобразить информацию о клиентах банка
     * @param Bank $bank
     */
    public static function display(Bank $bank)
    {
        echo "List of Customers with details\n\n";

        /** @var User $user */
        foreach ($bank->userList as $user) {
            echo "Name: $user->name<br/>";
            echo "Email: $user->email<br/>";
            echo "Account: " , $user->account->getAccountNumber(), "<br/>";
            echo "ATM pin: " , $user->account->getCard()->getPin(), "<br/>";
            echo "Balance: " , $user->account->getAmount(), "<br/>";
            echo "-----------------------------------------------------------------------<br/><br/>";
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
            echo "Transactions processing in On-Site Bank<br/>";
        }else{
            echo "Transactions processing in the ATM<br/>";
        }

        $bankingType->refill($user, 120);
        $bankingType->withdraw($user, 100);
        $bankingType->withdraw($user, 5);
    }
}

$bank = new Bank("PB-01");

Transaction::display($bank);

$bankATM = new BankATM("pb-01");

Transaction::executeTransactionsByAccount($bank, '12345');

Transaction::executeTransactionsByPin($bank, $bankATM, '1114');
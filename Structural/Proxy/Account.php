<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 04.04.2018
 * Time: 19:37
 */

namespace DesignPatterns\Structural\Proxy;


class Account
{

    /** @var string */
    private $accountNumber;

    /** @var float */
    private $amount;

    /** @var ATMCard $cardNumber */
    private $cardNumber;

    /** @var int */
    protected $_pinCount = 1111;

    /** @var int */
    protected $_cardCount = 9999999;

    public function __construct($accountNumber){
        $this->accountNumber = $accountNumber;
        $this->amount = 0.0;
        $this->cardNumber  = new ATMCard($accountNumber, (string)$this->_pinCount++, (string)$this->_cardCount++);
    }

    /**
     * @return string
     */
    public function getAccountNumber(): string
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
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return ATMCard
     */
    public function getCardNumber(): ATMCard
    {
        return $this->cardNumber;
    }

    /**
     * @param ATMCard $cardNumber
     */
    public function setCardNumber(ATMCard $cardNumber)
    {
        $this->cardNumber = $cardNumber;
    }

}
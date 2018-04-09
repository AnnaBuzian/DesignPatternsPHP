<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 04.04.2018
 * Time: 21:29
 */

namespace DesignPatterns\Structural\Proxy;

/**
 * Class ATMCard -
 * @package DesignPatterns\Structural\Proxy
 */
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
    public function getPin(): string
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
     * @return string
     */
    public function getCardNumber(): string
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
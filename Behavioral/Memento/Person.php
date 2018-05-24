<?php

namespace DesignPatterns\Behavioral\Memento;

/**
 * Class Person
 * @package DesignPatterns\Behavioral\Memento
 */
class Person
{
    /** @var string */
    private $firstName;

    /** @var string */
    private $lastName;

    /** @var string */
    private $phone;

    /** @var string */
    private $address;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @return PersonMemento
     */
    public function saveMemento()
    {
        return new PersonMemento($this->firstName, $this->lastName, $this->phone, $this->address);
    }

    /**
     * @param PersonMemento $memento
     */
    public function restoreMemento(PersonMemento $memento)
    {
        $this->setFirstName($memento->getFirstName());
        $this->setLastName($memento->getLastName());
        $this->setPhone($memento->getPhone());
        $this->setAddress($memento->getAddress());
    }
}

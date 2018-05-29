<?php

namespace DesignPatterns\Behavioral\Memento;

/**
 * Class Person - "Originator" in this implementation
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
     * Person constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $phone
     * @param string $address
     */
    public function __construct(string $firstName, string $lastName, string $phone, string $address)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->address = $address;
    }

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
        return new PersonMemento(clone $this);
    }

    /**
     * @param PersonMemento $memento
     */
    public function restoreMemento(PersonMemento $memento)
    {
        $this->firstName = $memento->getInformationPerson()->getFirstName();
        $this->lastName  = $memento->getInformationPerson()->getLastName();
        $this->phone     = $memento->getInformationPerson()->getPhone();
        $this->address   = $memento->getInformationPerson()->getAddress();
    }
}

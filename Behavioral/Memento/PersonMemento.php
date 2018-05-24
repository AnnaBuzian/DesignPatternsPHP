<?php

namespace DesignPatterns\Behavioral\Memento;

/**
 * Class PersonMemento
 * @package DesignPatterns\Behavioral\Memento
 */
class PersonMemento
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
     * PersonMemento constructor.
     * @param string $fName
     * @param string $lName
     * @param string $cell
     * @param string $address
     */
    public function __construct(string $fName, string $lName, string $cell, string $address)
    {
        $this->firstName = $fName;
        $this->lastName = $lName;
        $this->phone = $cell;
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
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
}

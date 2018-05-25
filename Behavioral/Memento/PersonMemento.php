<?php

namespace DesignPatterns\Behavioral\Memento;

/**
 * Class PersonMemento - State
 * @package DesignPatterns\Behavioral\Memento
 */
class PersonMemento
{
    /**
     * @var Person
     */
    private $informationPerson;

    /**
     * @param Person $informationPerson
     */
    public function __construct(Person $informationPerson)
    {
        $this->informationPerson = $informationPerson;
    }

    /**
     * @return Person
     */
    public function getInformationPerson(): Person
    {
        return $this->informationPerson;
    }

    /**
     * @param Person $informationPerson
     */
    public function setInformationPerson(Person $informationPerson)
    {
        $this->informationPerson = $informationPerson;
    }
}

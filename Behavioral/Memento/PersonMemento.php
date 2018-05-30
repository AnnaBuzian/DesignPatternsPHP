<?php

namespace DesignPatterns\Behavioral\Memento;

/**
 * Class PersonMemento - Memento State
 * @package DesignPatterns\Behavioral\Memento
 */
class PersonMemento
{
    /**
     * @var PersonOriginator
     */
    private $informationPerson;

    /**
     * @param PersonOriginator $informationPerson
     */
    public function __construct(PersonOriginator $informationPerson)
    {
        $this->informationPerson = $informationPerson;
    }

    /**
     * @return PersonOriginator
     */
    public function getInformationPerson(): PersonOriginator
    {
        return $this->informationPerson;
    }
}

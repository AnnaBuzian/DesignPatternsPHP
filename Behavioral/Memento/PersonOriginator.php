<?php

namespace DesignPatterns\Behavioral\Memento;

/**
 * Class Person - "Originator" in this implementation
 * @package DesignPatterns\Behavioral\Memento
 */
class PersonOriginator
{
    /** @var PersonState */
    private $currentState;

    public function __construct(string $firstName, string $lastName, string $phone, string $address)
    {
        $this->currentState = new PersonState($firstName,  $lastName,  $phone, $address);
    }

    /**
     * @return PersonMemento
     */
    public function saveMemento()
    {
        return new PersonMemento(clone $this->currentState);
    }

    /**
     * @param PersonMemento $memento
     */
    public function restoreMemento(PersonMemento $memento)
    {
        $this->currentState = $memento->getPersonState();
    }

    /**
     * @return PersonState
     */
    public function getCurrentState(): PersonState
    {
        return $this->currentState;
    }
}

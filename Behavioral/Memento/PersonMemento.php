<?php

namespace DesignPatterns\Behavioral\Memento;

/**
 * Class PersonMemento - Memento State
 * @package DesignPatterns\Behavioral\Memento
 */
class PersonMemento
{
    /**
     * @var PersonState
     */
    private $personState;



    /**
     * @param PersonState $personState
     */
    public function __construct(PersonState $personState)
    {
        $this->personState = $personState;
    }

    /**
     * @return PersonState
     */
    public function getPersonState(): PersonState
    {
        return $this->personState;
    }
}

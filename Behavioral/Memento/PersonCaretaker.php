<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24.05.18
 * Time: 23:35
 */

namespace DesignPatterns\Behavioral\Memento;

/**
 * Class PersonCaretaker - "Caretaker"
 * @package DesignPatterns\Behavioral\Memento
 */
class PersonCaretaker
{
    /** @var PersonMemento */
    private $memento;

    /**
     * @return PersonMemento
     */
    public function getMemento(): PersonMemento
    {
        return $this->memento;
    }

    /**
     * @param PersonMemento $memento
     */
    public function setMemento(PersonMemento $memento)
    {
        $this->memento = $memento;
    }

}
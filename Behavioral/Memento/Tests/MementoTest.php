<?php

namespace DesignPatterns\Behavioral\Memento\Tests;

use DesignPatterns\Behavioral\Memento\PersonCaretaker;
use DesignPatterns\Behavioral\Memento\PersonOriginator;
use PHPUnit\Framework\TestCase;

/**
 * Class MementoTest
 * @package DesignPatterns\Behavioral\Memento\Tests
 */
class MementoTest extends TestCase
{
    public function testRestoreStatePerson()
    {
        $person = new PersonOriginator(
            'Петров',
            'Петр',
            '+380660000000',
            'ул. Набережная Победы 30, г. Днепр'
        );

        $caretaker = new PersonCaretaker();
        $caretaker->setMemento($person->saveMemento());

        $person->getCurrentState()->setFirstName("Сидоров");
        $this->assertEquals("Петров", (string) $person->getCurrentState()->getFirstName());

        $person->restoreMemento($caretaker->getMemento());
        $this->assertEquals("Петров", (string) $person->getCurrentState()->getFirstName());
    }
}

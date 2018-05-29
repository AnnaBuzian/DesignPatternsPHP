<?php

namespace DesignPatterns\Behavioral\Memento\Tests;

use DesignPatterns\Behavioral\Memento\PersonCaretaker;
use DesignPatterns\Behavioral\Memento\Person;
use PHPUnit\Framework\TestCase;

class MementoTest extends TestCase
{
    public function testSaveStatePerson()
    {
        $person = new Person(
            'Петров',
            'Петр',
            '+380660000000',
            'ул. Набережная Победы 30, г. Днепр'
        );

        $caretaker = new PersonCaretaker();
        $caretaker->setMemento($person->saveMemento());

        $this->assertEquals("Петров", (string) $person->getFirstName());
    }

    public function testRestoreStatePerson()
    {
        $person = new Person(
            'Петров',
            'Петр',
            '+380660000000',
            'ул. Набережная Победы 30, г. Днепр'
        );

        $caretaker = new PersonCaretaker();
        $caretaker->setMemento($person->saveMemento());

        $person->setFirstName("Сидоров");
        $person->restoreMemento($caretaker->getMemento());

        $this->assertEquals("Петров", (string) $person->getFirstName());
    }
}

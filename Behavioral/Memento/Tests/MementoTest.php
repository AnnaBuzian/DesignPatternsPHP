<?php

namespace DesignPatterns\Behavioral\Memento\Tests;

use DesignPatterns\Behavioral\Memento\PersonCaretaker;
use DesignPatterns\Behavioral\Memento\Person;
use PHPUnit\Framework\TestCase;

class MementoTest extends TestCase
{
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
        $this->assertEquals("Петров", (string) $person->getFirstName());

        $person->restoreMemento($caretaker->getMemento());
        $this->assertEquals("Петров", (string) $person->getFirstName());
    }
}

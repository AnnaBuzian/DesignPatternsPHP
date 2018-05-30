<?php

namespace DesignPatterns\Behavioral\TemplateMethod\Tests;

use DesignPatterns\Behavioral\TemplateMethod;
use PHPUnit\Framework\TestCase;

/**
 * Class TemplateMethodTest
 * @package DesignPatterns\Behavioral\TemplateMethod\Tests
 */
class TemplateMethodTest extends TestCase
{
    /**
     * Можно ли построить стеклянный дом
     */
    public function testCanBuildGlassHouse()
    {
        $house = new TemplateMethod\GlassHouse();
        $house->buildHouse();

        $this->assertEquals(
            [
                "Building foundation with cement, iron rods and sand",
                "Building Pillars with glass coating",
                "Building Glass Walls",
                "Building Glass Windows"
            ],
            $house->getHouse()
        );
    }

    /**
     * Можно ли построить деревяный дом
     */
    public function testCanBuildWoodenHouse()
    {
        $house = new TemplateMethod\WoodenHouse();
        $house->buildHouse();

        $this->assertEquals(
            [
                "Building foundation with cement, iron rods and sand",
                "Building Pillars with Wood coating",
                "Building Wooden Walls",
                "Building Glass Windows"
            ],
            $house->getHouse()
        );
    }
}

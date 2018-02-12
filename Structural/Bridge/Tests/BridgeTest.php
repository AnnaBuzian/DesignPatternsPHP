<?php

namespace DesignPatterns\Structural\Bridge\Tests;


use DesignPatterns\Structural\Bridge\Circle;
use DesignPatterns\Structural\Bridge\GradientColor;
use DesignPatterns\Structural\Bridge\SolidColor;
use DesignPatterns\Structural\Bridge\Square;
use PHPUnit\Framework\TestCase;

class BridgeTest extends TestCase
{
    public function testCanDrawCircleWithSolidBackground()
    {
        $circle = new Circle(7.12, new SolidColor("RED"));
        $this->assertEquals('Create a circle with radius: 7.12. Fill with: RED', $circle->draw());
    }


    public function testCanDrawSquareWithGradientBackground()
    {
        $circle = new Square(7.3, new GradientColor("RED", "GREEN"));
        $this->assertEquals('Create a square with width: 7.3. Fill with: RED & GREEN', $circle->draw());
    }
}

<?php

namespace DesignPatterns\Structural\Bridge;

/**
 * Class Circle
 * @package DesignPatterns\Structural\Bridge
 */
class Circle implements ShapeInterface
{
    /** @var float  */
    private $radius;

    /** @var  BackgroundInterface */
    private $background;

    /**
     * Circle constructor.
     * @param $radius
     * @param BackgroundInterface $background
     */
    public function __construct(float $radius, BackgroundInterface $background)
    {
        $this->radius = $radius;
        $this->background = $background;
    }

    /**
     * @return string
     */
    public function draw() {
        return "Create a circle with radius: " . $this->radius . '. '
            . $this->background->fill();
    }
}

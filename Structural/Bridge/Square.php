<?php

namespace DesignPatterns\Structural\Bridge;

/**
 * Class Square
 * @package DesignPatterns\Structural\Bridge
 */
class Square implements ShapeInterface
{
    /** @var float  */
    private $width;

    /** @var  BackgroundInterface */
    private $background;

    /**
     * Square constructor.
     * @param float $width
     * @param BackgroundInterface $background
     */
    public function __construct(float $width, BackgroundInterface $background)
    {
        $this->width = $width;
        $this->background = $background;
    }


    /**
     * @return string
     */
    public function draw() {
        return "Create a square with width: " . $this->width . '. '
            . $this->background->fill();
    }
}

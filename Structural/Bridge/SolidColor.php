<?php

namespace DesignPatterns\Structural\Bridge;

/**
 * Class SolidColor
 * @package DesignPatterns\Structural\Bridge
 */
class SolidColor implements BackgroundInterface
{
    /** string $color */
    private $color;

    /**
     * SolidColor constructor.
     * @param string $color
     */
    public function __construct(string $color)
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function fill()
    {
        return ("Fill with: " . $this->color);
    }
}

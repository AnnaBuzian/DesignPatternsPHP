<?php

namespace DesignPatterns\Structural\Bridge;

/**
 * Class GradientColor
 * @package DesignPatterns\Structural\Bridge
 */
class GradientColor implements BackgroundInterface
{
    /** string $colorX */
    private $colorX;

    /** string $colorY */
    private $colorY;

    /**
     * GradientColor constructor.
     * @param string $colorX
     * @param string $colorY
     */
    public function __construct(string $colorX, string $colorY)
    {
        $this->colorX = $colorX;
        $this->colorY = $colorY;
    }

    /**
     * @return string
     */
    public function fill()
    {
        return "Fill with: " . $this->colorX . " & " . $this->colorY;
    }
}

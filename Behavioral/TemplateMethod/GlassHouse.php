<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 30.05.2018
 * Time: 23:28
 */

namespace DesignPatterns\Behavioral\TemplateMethod;

/**
 * Class GlassHouse
 * @package DesignPatterns\Behavioral\TemplateMethod
 */
class GlassHouse extends HouseTemplate
{

    /**
     * Построить стены
     * @return mixed
     */
    public function buildWalls()
    {
        return "Building Glass Walls";
    }

    /**
     * Построить опоры
     * @return mixed
     */
    public function buildPillars()
    {
        return "Building Pillars with glass coating";
    }
}
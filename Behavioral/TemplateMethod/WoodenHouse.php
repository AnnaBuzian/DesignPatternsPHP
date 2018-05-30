<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 30.05.2018
 * Time: 23:27
 */

namespace DesignPatterns\Behavioral\TemplateMethod;

/**
 * Class WoodenHouse
 * @package DesignPatterns\Behavioral\TemplateMethod
 */
class WoodenHouse extends HouseTemplate
{

    /**
     * Построить стены
     * @return mixed
     */
    public function buildWalls()
    {
        return "Building Wooden Walls";
    }

    /**
     * Построить опоры
     * @return mixed
     */
    public function buildPillars()
    {
        return "Building Pillars with Wood coating";
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 30.05.2018
 * Time: 23:19
 */

namespace DesignPatterns\Behavioral\TemplateMethod;

/**
 * Class HouseTemplate
 * @package DesignPatterns\Behavioral\TemplateMethod
 */
abstract class HouseTemplate
{

    /**
     * @var string[]
     */
    private $house = [];

    /**
     * Построить дом
     * @return string
     */
    public function buildHouse()
    {
        $this->house[] = $this->buildFoundation();
        $this->house[] = $this->buildPillars();
        $this->house[] = $this->buildWalls();
        $this->house[] = $this->buildWindows();
    }

    /**
     * Поставить окна
     * @return string
     */
    private function buildWindows()
    {
        return "Building Glass Windows";
	}

    /**
     * Построить стены
     * @return mixed
     */
	public abstract function buildWalls();

    /**
     * Построить опоры
     * @return mixed
     */
	public abstract function buildPillars();

    /**
     * Построить фундамент
     * @return string
     */
	private function buildFoundation()
    {
        return "Building foundation with cement, iron rods and sand";
	}

    /**
     * @return string[]
     */
    public function getHouse(): array
    {
        return $this->house;
    }
}
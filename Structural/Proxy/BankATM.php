<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 09.04.2018
 * Time: 18:34
 */

namespace DesignPatterns\Structural\Proxy;


class BankATM extends CoreBanking
{
    /** @var string */
    public $atmId;


    /**
     * BankATM constructor.
     * @param $atmId
     */
    public function __construct($atmId)
    {
        $this->atmId = $atmId;
    }

}
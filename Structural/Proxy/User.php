<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 04.04.2018
 * Time: 19:35
 */

namespace DesignPatterns\Structural\Proxy;

class User
{
    /** @var string */
    public $name;

    /** @var string */
    public $email;

    /** @var Account */
    public $account;


    /**
     * User constructor.
     * @param $name
     * @param $email
     * @param $account
     */
    public function __construct($name, $email, Account $account)
    {
        $this->name = $name;
        $this->email = $email;
        $this->account = $account;
    }

}
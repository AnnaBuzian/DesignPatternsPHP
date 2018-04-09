<?php
/**
 * Created by PhpStorm.
 * User: annabuzian
 * Date: 09.04.2018
 * Time: 18:21
 */

namespace DesignPatterns\Structural\Proxy;


class Bank extends CoreBanking
{
    /** @var string */
    public $branchCode;

    /** @var array  */
    public $userList = [];

    /** @var int  */
    protected $_accountNumberCounter = 12345;


    /**
     * Bank constructor.
     * @param $branch
     */
    public function __construct($branch)
    {
        $this->branchCode = $branch;

        $this->addUser("User1", "user1@mail.com");
        $this->addUser("User2", "user2@mail.com");
    }


    public function addUser($name, $email)
    {
        $user = new User($name, $email, new Account($this->_accountNumberCounter++));
        array_push($this->userList, $user);
    }

}
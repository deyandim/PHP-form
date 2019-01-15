<?php
/**
 * Created by PhpStorm.
 * User: BGDEDIM3
 * Date: 2019-01-12
 * Time: 13:18
 */

namespace Models\ViewModel;


class UserRegisterViewModel
{
    private $username;
    private $password;

    /**
     * UserRegisterViewModel constructor.
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }




}
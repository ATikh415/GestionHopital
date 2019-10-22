<?php

namespace App\Model;

class Secretariat{

    private $id;
    private $name_sec;
    private $phone_sec;
    private $addr;
    private $id_users;
    private $login;
    private $password;
    

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNameSec()
    {
        return $this->name_sec;
    }

    public function setName_sec($name_sec)
    {
        $this->name_sec = $name_sec;

        return $this;
    }

    public function getPhoneSec()
    {
        return $this->phone_sec;
    }


    public function setPhone_Sec($phone_sec)
    {
        $this->phone_sec = $phone_sec;

        return $this;
    }

    public function getAddr()
    {
        return $this->addr;
    }

    public function setAddr($addr)
    {
        $this->addr = $addr;

        return $this;
    }


    public function getIdUsers()
    {
        return $this->id_users;
    }

    public function setId_users($id_users)
    {
        $this->id_users = $id_users;

        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
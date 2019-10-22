<?php

namespace App\Model;

class Medecin{
    private $cin;
    private $name_med;
    private $phone_med;
    private $login;
    private $password;
    private $addr_med;
    private $id_users;
    private $id;
    private $name_sp;
    private $id_med_specialites;
    private $name_service;


    public function getCin(): int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNameMed():string
    {
        return $this->name_med;
    }

    public function setName($name): self
    {
        $this->name_med = $name;

        return $this;
    }
    
    public function getPhone(): string
    {
        return $this->phone_med;
    }

    public function setPhone($phone): self
    {
        $this->phone_med = $phone;

        return $this;
    }

    public function getAddr(): string
    {
        return $this->addr_med;
    }

    public function setAddr($addr): self
    {
        $this->addr_med = $addr;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIdMedSpecialites()
    {
        return $this->id_med_specialites;
    }

    public function setId_med_specialites(int $id_med_specialites): self
    {
        $this->id_med_specialites = $id_med_specialites;

        return $this;
    }

    public function getNameSp()
    {
        return $this->name_sp;
    }

    public function getNameService()
    {
        return $this->name_service;
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

    /**
     * Get the value of id_users
     */ 
    public function getIdUsers()
    {
        return $this->id_users;
    }

    /**
     * Set the value of id_users
     *
     * @return  self
     */ 
    public function setId_users($id_users)
    {
        $this->id_users = $id_users;

        return $this;
    }
}
<?php

namespace App\Model;

class Medecin{
    private $cin;
    private $name;
    private $phone;
    private $addr;
    private $id;
    private $id_med_specialites;


    public function getCin(): int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }
    
    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone($phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAddr(): string
    {
        return $this->addr;
    }

    public function setAddr($addr): self
    {
        $this->addr = $addr;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId_med_specialites(): int
    {
        return $this->id_med_specialites;
    }

    public function setId_med_specialites(int $id_med_specialites): self
    {
        $this->id_med_specialites = $id_med_specialites;

        return $this;
    }
}
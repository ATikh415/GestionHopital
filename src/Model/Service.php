<?php

namespace App\Model;

class Service{

    private $id;
    private $name_service;
    private $id_specialites;
    private $name;
    private $id_secretariats;
    private $name_sec;

    public function getId():?int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNameService(): ?string
    {
        return $this->name_service;
    }

    public function setName(string $name): self
    {
        $this->name_service = $name;

        return $this;
    }

    public function getIdSpecialites()
    {
        return $this->id_specialites;
    }

    public function setId_specialites($id_specialites): self
    {
        $this->id_specialites = $id_specialites;

        return $this;
    }

    public function getIdSecretariats()
    {
        return $this->id_secretariats;
    }

    public function setId_secretariats($id_secretariats): self
    {
        $this->id_secretariats = $id_secretariats;

        return $this;
    }

    public function getNameSec()
    {
        return $this->name_sec;
    }

    public function getName()
    {
        return $this->name;
    }

}
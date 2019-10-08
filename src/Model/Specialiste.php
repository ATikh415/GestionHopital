<?php

namespace App\Model;

class Specialiste{
    private $id;
    private $name_sp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNameSp(): ?string
    {
        return $this->name_sp;
    }

    public function setName_sp($name_sp): self
    {
        $this->name_sp = $name_sp;

        return $this;
    }
}
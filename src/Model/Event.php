<?php

namespace App\Model;

use DateTime;

class Event{
    
    private $id;
    private $name;
    private $description;
    private $start;
    private $end;
    private $cin;
    private $cin_medecins;
    private $id_secretariats;


    public function getId(): ?int
    {
        return $this->id;
    }
 
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }


    public function getName(): ?string
    {
        return $this->name;
    }


    public function setName(string $name):self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    
    public function getStart()
    {
        return new DateTime($this->start);
    }

    public function getEnd()
    {
        return new DateTime($this->end);
    }

    public function setEnd(string $end): self
    {
        $this->end = $end;

        return $this;
    }
   
    public function setStart(string $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getCin()
    {
        return $this->cin;
    }

    public function setCin($cin):self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getCin_medecins()
    {
        return $this->cin_medecins;
    }

    public function setCin_medecins($cin_medecins)
    {
        $this->cin_medecins = $cin_medecins;

        return $this;
    }

    /**
     * Get the value of id_secretariats
     */ 
    public function getId_secretariats()
    {
        return $this->id_secretariats;
    }

    /**
     * Set the value of id_secretariats
     *
     * @return  self
     */ 
    public function setId_secretariats($id_secretariats)
    {
        $this->id_secretariats = $id_secretariats;

        return $this;
    }
}
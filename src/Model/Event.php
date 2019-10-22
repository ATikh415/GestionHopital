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
    private $name_patient;
    private $date_naissance_p;
    private $lieu_naissance_p;
    private $phone_patient;
    private $addr_patient;
    private $name_med;
    private $phone_med;
    private $name_service;
    private $name_sp;
    private $valid;
   


    public function getId(): ?int
    {
        return $this->id;
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

    public function getDate()
    {
        return new DateTime($this->start);
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

    public function getCinMedecins()
    {
        return $this->cin_medecins;
    }

    public function setCin_medecins($cin_medecins)
    {
        $this->cin_medecins = $cin_medecins;

        return $this;
    }


    public function getId_secretariats()
    {
        return $this->id_secretariats;
    }

    public function setId_secretariats($id_secretariats)
    {
        $this->id_secretariats = $id_secretariats;

        return $this;
    }

    public function getName_Patient(): ?string
    {
        return $this->name_patient;
    }

    public function getPhone_Patient(): ?string
    {
        return $this->phone_patient;
    }

    public function getAddr_Patient(): ?string
    {
        return $this->addr_patient;
    }

    public function getName_Med()
    {
        return $this->name_med;
    }

    public function getPhone_Med(): ?string
    {
        return $this->phone_med;
    }

    public function getName_Sp()
    {
        return $this->name_sp;
    }

    public function getName_Service()
    {
        return $this->name_service;
    }

    public function getDate_Naissance()
    {
        return new DateTime($this->date_naissance_p);
    }

    public function getLieu_Naissance()
    {
        return $this->lieu_naissance_p;
    }

    public function getValid()
    {
        return $this->valid;
    }

    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }
}
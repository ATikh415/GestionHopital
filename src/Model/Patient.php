<?php

namespace App\Model;

use DateTime;

class Patient{
    private $cin;
    private $name_patient;
    private $date_naissance_p;
    private $lieu_naissance_p;
    private $sex;
    private $addr_patient;
    private $phone_patient;


    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin($cin): self
    {
        $this->cin = $cin;

        return $this;
    }


    public function getNamePatient(): ?string
    {
        return $this->name_patient;
    }

    public function setName_Patient($name_patient): self
    {
        $this->name_patient = $name_patient;

        return $this;
    }

    public function getDateNaissanceP()
    {
        return new DateTime($this->date_naissance_p);
    }

    public function setDate_naissance_p($date_naissance_p):self
    {
        $this->date_naissance_p = $date_naissance_p;

        return $this;
    }

    public function getLieuNaissanceP(): ?string
    {
        return $this->lieu_naissance_p;
    }

    public function setLieu_naissance_p($lieu_naissance_p): self
    {
        $this->lieu_naissance_p = $lieu_naissance_p;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex($sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getAddrPatient(): ?string
    {
        return $this->addr_patient;
    }

    public function setAddr_patient($addr_patient): self
    {
        $this->addr_patient = $addr_patient;

        return $this;
    }

    public function getPhonePatient(): ?string
    {
        return $this->phone_patient;
    }

    public function setPhone_patient($phone_patient): self
    {
        $this->phone_patient = $phone_patient;

        return $this;
    }
}
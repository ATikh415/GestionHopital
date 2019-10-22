<?php

namespace App\Model;

use DateTime;

class Planning{
    private $id;
    private $start;
    private $end;
    private $cin;
    private $name_med;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getDateStart()
    {
        return new DateTime($this->start);
    }


    public function getStart()
    {
        return new DateTime($this->start);
    }

    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    public function getDateEnd()
    {
        return new DateTime($this->end);
    }

    public function getEnd()
    {
        return new DateTime($this->end);
    }

    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    public function getCin()
    {
        return $this->cin;
    }

    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    public function getNameMed()
    {
        return $this->name_med;
    }

    public function setName_med($name_med)
    {
        $this->name_med = $name_med;

        return $this;
    }
}
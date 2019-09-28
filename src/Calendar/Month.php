<?php

namespace App\Calendar;

class Month{

    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    private $months = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin',
                        'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];

    public $month;
    public $year;

    public function __construct(?int $month = null, ?int $year = null)
    {
        if($month === null || $month <1 || $month > 12){
            $month = intval(date('m'));
        }
        if($year === null){
            $year = intval(date('Y'));
        }
        
        
        $this->month = $month;
        $this->year = $year;
    }

    public function toString(): string{
        return $this->months[$this->month - 1] .' '. $this->year;
    }

}
<?php


namespace App\Calendar;

use DateTimeImmutable;
use DateTimeInterface;

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

    public function getDay(){
        return $this->days;
    }

    public function getWeeks(): int{
        $start = $this->getStartingDay();
      
        $end = $start->modify(" +1 month -1 day");

        $startWeek = intval($start->format('W'));
        $endWeek = intval($end->format('W'));
      
        if($endWeek === 1){
            $endWeek = \intval($end->modify('- 7 days')->format('W')) + 1;
        }
        
        $week = $endWeek - $startWeek + 1;
       
        if($week < 0){
            $week = \intval($end->format('W'));
        }
        return $week;
    }

    public function getStartingDay(): DateTimeInterface{
        return new DateTimeImmutable("{$this->year}-{$this->month}-01");
    }

    public function withinMonth(DateTimeInterface $date): bool
    {
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }

    public function nextMonth(): Month
    {
        $month = $this->month + 1;
        $year = $this->year;
        if( $month > 12){
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }

    public function previousMonth(): Month
    {
        $month = $this->month - 1;
        $year = $this->year;
        if( $month < 1){
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }

}
<?php

namespace App\Table;

use App\Model\Event;
use Core\Table\Table;
use DateTimeInterface;

class EventTable extends Table{
    protected $class= Event::class;

    public function getEventsBetween(DateTimeInterface $start, DateTimeInterface $end)
    {
       return $this->query("SELECT * FROM {$this->table}
        WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND
          '{$end->format('Y-m-d 23:59:59')}' ORDER BY start ASC");
        
    }

    public function getEventsBetweenByDays(DateTimeInterface $start, DateTimeInterface $end): array
    {
        $days = [];
        $events = $this->getEventsBetween($start, $end);
        foreach($events as $event){
    
            $date = $event->getStart()->format('Y-m-d');
            if(!isset($days[$date])){
                $days[$date] = [$event];
            }else{
                $days[$date][] = $event;
            }
            
        }
        return $days;
    }

    
}
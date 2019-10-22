<?php

namespace App\Table;

use App\Model\Event;
use Core\Table\Table;
use DateTimeImmutable;
use DateTimeInterface;

class EventTable extends Table{
    protected $class= Event::class;

    public function getEventsBetween(DateTimeInterface $start, DateTimeInterface $end)
    {
       return $this->query("SELECT * FROM {$this->table} 
       WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND
       '{$end->format('Y-m-d 23:59:59')}' ORDER BY start ASC");
    }

    public function getEventsByDoctor(DateTimeInterface $start, DateTimeInterface $end, $cin)
    {
       return $this->query("SELECT * FROM {$this->table} 
       WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND
       '{$end->format('Y-m-d 23:59:59')}' AND cin_medecins = ?",
       [$cin]);
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

    public function getEventsBetweenByDaysDoctor(DateTimeInterface $start, DateTimeInterface $end, $cin): array
    {
        $days = [];
        $events = $this->getEventsByDoctor($start, $end, $cin);
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

    public function getEventsBySecretary(DateTimeInterface $start, DateTimeInterface $end, $id)
    {
       return $this->query("SELECT * FROM {$this->table} 
       WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND
       '{$end->format('Y-m-d 23:59:59')}' AND id_secretariats = ?",
       [$id]);
    }

    public function getEventsBetweenByDaysSecretary(DateTimeInterface $start, DateTimeInterface $end, $id): array
    {
        $days = [];
        $events = $this->getEventsBySecretary($start, $end, $id);
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


    public function records($cin){
        return $this->query("SELECT * FROM {$this->table} 
       WHERE cin_medecins = ? ORDER BY start ASC",
       [$cin]);
    }

    public function valid(int $id, int $valid){
        $this->query("UPDATE {$this->table} SET valid = :valid WHERE id = :id",
    ['valid' => $valid, 'id' => $id]);
    }

    public function findEvent(int $id){
        return $this->query("SELECT * 
        FROM events e, patients p, medecins m, med_specialites sp, services s
        WHERE e.cin = p.cin AND e.cin_medecins = m.cin AND m.id = s.id AND m.id_med_specialites = sp.id AND
        e.id = ?",
        [$id],
        true
        );
    } 
    
    public function createEvent(Event $event){
        $this->create([
            'name' => $event->getName(),
            'description' => $event->getDescription(),
            'start' => $event->getStart()->format('Y-m-d H:i:s'),
            'end' => $event->getEnd()->format('Y-m-d H:i:s'),
            'cin' => $event->getCin(),
            'cin_medecins' => $event->getCinMedecins(),
            'id_secretariats' => $event->getId_secretariats()
        ]);
    }

    public function updateEvent(Event $event){
        $this->updateById([
            'name' => $event->getName(),
            'description' => $event->getDescription(),
            'start' => $event->getStart()->format('Y-m-d H:i:s'),
            'end' => $event->getEnd()->format('Y-m-d H:i:s'),
            'cin' => $event->getCin(),
            'cin_medecins' => $event->getCinMedecins(),
            'id_secretariats' => $event->getId_secretariats()
        ], $event->getId());
    }

    public function hydrate(Event $event, array $data){
        $event->setName($data['name']);
        $event->setDescription($data['description']);
        $event->setStart(DateTimeImmutable::createFromFormat('Y-m-d H:i', $data['date'] .' '. explode(' - ',$_POST['hour'])[0])
        ->format('Y-m-d H:i:s'));
        $event->setEnd(DateTimeImmutable::createFromFormat('Y-m-d H:i', $data['date'] .' '. explode(' - ',$_POST['hour'])[1])
        ->format('Y-m-d H:i:s'));
        $event->setCin($data['cin']);
        $event->setCin_medecins($data['cin_medecins']);
        $event->setId_secretariats($data['id']);
        return $event;
    }
}
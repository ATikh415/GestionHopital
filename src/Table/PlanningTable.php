<?php

namespace App\Table;

use App\Model\Planning;
use Core\Table\Table;
use DateTimeImmutable;

class PlanningTable extends Table{
    protected $class = Planning::class;

    public function allByDoctor(int $id){
        return $this->query("SELECT p.*, m.name_med FROM plannings p, medecins m
        WHERE p.cin = m.cin AND m.id = ? ORDER BY p.id DESC",
        [$id]);
    }

    public function findBydoctor($id){
        return $this->query("SELECT p.*, m.name_med FROM plannings p, medecins m
        WHERE p.cin = m.cin AND p.id = ?",
        [$id], true);
    }

    public function updatePlanning(Planning $planning){
        $this->updateById([
            'start' => $planning->getStart()->format('Y-m-d H:i:s'),
            'end' => $planning->getEnd()->format('Y-m-d H:i:s'),
            'cin' => $planning->getCin()
        ], $planning->getId());
    }

    public function createPlanning(Planning $planning){
        $this->create([
            'start' => $planning->getStart()->format('Y-m-d H:i:s'),
            'end' => $planning->getEnd()->format('Y-m-d H:i:s'),
            'cin' => $planning->getCin()
        ]);
    }

    public function hydrate(Planning $planning,array $data){
        $planning->setStart(DateTimeImmutable::createFromFormat('Y-m-d H:i', $data['date_start'].' '.$data['start'])
        ->format('Y-m-d H:i:s'));
        $planning->setEnd(DateTimeImmutable::createFromFormat('Y-m-d H:i', $data['date_end'].' '.$data['end'])
        ->format('Y-m-d H:i:s'));
        $planning->setCin($data['cin']);
        return $planning;
    }
   
}
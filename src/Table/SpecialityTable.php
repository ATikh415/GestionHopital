<?php 

namespace App\Table;

use App\Model\Speciality;
use Core\Table\Table;

class SpecialityTable extends Table{
    protected $class = Speciality::class;
    protected $table = 'specialites';

    public function createSpeciality(Speciality $item){
        $this->create([
            'name' => $item->getName()
        ]);
    }

    public function updateSpeciality(Speciality $item){
        $this->updateById([
            'name' => $item->getName()
        ], $item->getId());
    }

    public function hydrate(Speciality $item, array $data){
        $item->setName($data['name']);
        return $item;
    }
}
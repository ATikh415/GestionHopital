<?php 

namespace App\Table;

use App\Model\Specialiste;
use Core\Table\Table;

class SpecialisteTable extends Table{
    protected $class = Specialiste::class;
    protected $table = 'med_specialites';

    public function createSpecialiste(Specialiste $specialiste){
        $this->create([
            'name_sp' => $specialiste->getNameSp()
        ]);
    }

    public function updateSpecialiste(Specialiste $specialiste){
        $this->updateById([
            'name_sp' => $specialiste->getNameSp()
        ], $specialiste->getId());
    }

    public function hydrate(Specialiste $specialiste, array $data){
        $specialiste->setName_sp($data['name_sp']);
        return $specialiste;
    }
}
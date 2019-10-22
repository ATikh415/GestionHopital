<?php

namespace App\Table;

use App\Model\Medecin;
use Core\Table\Table;

class MedecinTable extends Table{

    protected $class = Medecin::class;

    public function findByCin(int $cin){
        return $this->query("SELECT * 
        FROM medecins m, med_specialites sp, services s
        WHERE m.id = s.id AND m.id_med_specialites = sp.id AND
        cin = ?",
        [$cin],
        true
        );
    }

    public function getAllDoctor(){
        return $this->query("SELECT * 
        FROM medecins m, med_specialites sp, services s
        WHERE m.id = s.id AND m.id_med_specialites = sp.id");
    }

    public function allByService($id_service){
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?",
        [$id_service]);
    }

    public function extractByService(string $key, string $value, int $id_service){
        $records = $this->allByService($id_service);
        $return = [];
       $key = 'get' . str_replace(' ', '', ucwords(str_replace('_',' ', $key)));
       $value = 'get' . str_replace(' ', '', ucwords(str_replace('_',' ', $value)));
        //$value = $this->data->$method();
        foreach($records as $v){
            $return[$v->$key()] = $v->$value();
        }
       
        return $return;
    }

    public function updateDoctor(Medecin $doctor){
        $this->update([
            'name_med' => $doctor->getNameMed(),
            'login' => $doctor->getLogin(),
            'password' => $doctor->getPassword(),
            'id' => $doctor->getId(),
            'id_med_specialites' => $doctor->getIdMedSpecialites(),
            'addr_med' => $doctor->getAddr(),
            'phone_med' => $doctor->getPhone()
        ],$doctor->getCin());
    }

    public function createDoctor(Medecin $doctor)
    {
        $this->create([
            'cin' => $doctor->getCin(),
            'name_med' => $doctor->getNameMed(),
            'login' => $doctor->getLogin(),
            'password' => $doctor->getPassword(),
            'id' => $doctor->getId(),
            'id_med_specialites' => $doctor->getIdMedSpecialites(),
            'addr_med' => $doctor->getAddr(),
            'phone_med' => $doctor->getPhone()
        ]);
    }

    public function hydrate(Medecin $doctor, array $data){
        $doctor->setCin($data['cin']);
        $doctor->setName($data['name_med']);
        $doctor->setLogin($data['login']);
        $doctor->setPassword($data['password']);
        $doctor->setId($data['id']);
        $doctor->setId_med_specialites($data['id_med_specialites']);
        $doctor->setAddr($data['addr']);
        $doctor->setPhone($data['phone']);
        $doctor->setId_users($data['id_users']);

        return $doctor;
    }
}
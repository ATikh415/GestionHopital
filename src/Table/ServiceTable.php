<?php 

namespace App\Table;

use App\Model\Service;
use Core\Table\Table;

class ServiceTable extends Table{
    protected $class = Service::class;

    public function findBySecretary(int $id){
        return $this->query("SELECT * FROM {$this->table}
        WHERE id_secretariats = ?",
        [$id],
        true
        );
    }

    public function getService(){
        return $this->query("SELECT s.*, sp.name, sec.name_sec FROM services s, specialites sp, secretariats sec
        WHERE s.id_specialites = sp.id AND s.id_secretariats = sec.id ORDER BY s.id DESC"
        );
    }

    public function updateService(Service $service){
        $this->create([
            'name_service' => $service->getNameService(),
            'id_specialites' => $service->getIdSpecialites(),
            'id_secretariats' => $service->getIdSecretariats(),
        ], $service->getId());
    }

    public function createService(Service $service){
        $this->create([
            'name_service' => $service->getNameService(),
            'id_specialites' => $service->getIdSpecialites(),
            'id_secretariats' => $service->getIdSecretariats(),
        ]);
    }

    public function hydrate(Service $service, array $data){
        $service->setName($data['name_service']);
        $service->setId_specialites($data['id_specialites']);
        $service->setId_secretariats($data['id_secretariats']);

        return $service;
    }
}
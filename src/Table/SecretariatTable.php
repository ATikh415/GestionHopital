<?php

namespace App\Table;

use App\Model\Secretariat;
use Core\Table\Table;

class SecretariatTable extends Table{

    protected $class = Secretariat::class;



    public function createSecretary(Secretariat $secretariat){
        $this->create([
            'name_sec' => $secretariat->getNameSec(),
            'login' => $secretariat->getLogin(),
            'password' => $secretariat->getPassword(),
            'phone_sec' => $secretariat->getPhoneSec(),
            'addr' => $secretariat->getAddr(),
            'id_users' => $secretariat->getIdUsers()
        ]);
    }

    public function updateSecretary(Secretariat $secretariat){
        $this->updateById([
            'name_sec' => $secretariat->getNameSec(),
            'login' => $secretariat->getLogin(),
            'password' => $secretariat->getPassword(),
            'phone_sec' => $secretariat->getPhoneSec(),
            'addr' => $secretariat->getAddr(),
            'id_users' => $secretariat->getIdUsers()
        ], $secretariat->getId());
    }

    public function hydrate(Secretariat $secretariat, array $data){
        $secretariat->setName_sec($data['name_sec']);
        $secretariat->setLogin($data['login']);
        $secretariat->setPassword(password_hash($data['password'], PASSWORD_BCRYPT));
        $secretariat->setPhone_Sec($data['phone_sec']);
        $secretariat->setAddr($data['addr']);
        $secretariat->setId_users($data['id_users']);

        return $secretariat;
    }
}
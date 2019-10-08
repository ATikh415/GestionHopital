<?php

namespace App\Table;

use App\Model\Patient;
use Core\Table\Table;
use DateTimeImmutable;

class PatientTable extends Table{

    protected $class = Patient::class;

   public function updatePatient(Patient $patient)
   {
    $this->update([
        'name_patient' => $patient->getNamePatient(),
        'date_naissance_p' => $patient->getDateNaissanceP()->format('Y-m-d'),
        'lieu_naissance_p' => $patient->getLieuNaissanceP(),
        'sex' => $patient->getSex(),
        'addr_patient' => $patient->getAddrPatient(),
        'phone_patient' => $patient->getPhonePatient()
    ], $patient->getCin());
   }

    public function createPatient(Patient $patient){
        $this->create([
            'cin' => $patient->getCin(),
            'name_patient' => $patient->getNamePatient(),
            'date_naissance_p' => $patient->getDateNaissanceP()->format('Y-m-d'),
            'lieu_naissance_p' => $patient->getLieuNaissanceP(),
            'sex' => $patient->getSex(),
            'addr_patient' => $patient->getAddrPatient(),
            'phone_patient' => $patient->getPhonePatient()
        ]);
    }

    public function hydrate(Patient $patient, array $data){
        $patient->setCin($data['cin']);
        $patient->setName_Patient($data['name_patient']);
        $patient->setDate_naissance_p(DateTimeImmutable::createFromFormat('Y-m-d', $data['date_naissance_p'])->format('Y-m-d'));
        $patient->setLieu_naissance_p($data['lieu_naissance_p']);
        $patient->setSex($data['sex']);
        $patient->setAddr_patient($data['addr_patient']);
        $patient->setPhone_patient($data['phone_patient']);
        return $patient;
    }
}
<?php

namespace App\Validator;

use Core\Validator\Validator;

class PatientValidator extends Validator{

    public function validates(array $data)
    {
        parent::validates($data);
        $this->validate('cin', 'toNumeric');
        $this->validate('name_patient', 'alpha');
        $this->validate('date_naissance_p', 'date');
        $this->validate('lieu_naissance_p', 'alpha');
        $this->validate('sex', 'radio');
        $this->validate('addr_patient', 'alphNum');
        $this->validate('phone_patient', 'phone');
        return $this->errors;
    }
}
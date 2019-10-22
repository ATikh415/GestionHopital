<?php

namespace App\Validator;

use Core\Validator\Validator;

class SpecialisteValidator extends Validator{

    public function validates(array $data)
    {
        parent::validates($data);
        $this->validate('name_sp', 'minLength', 3);
     
        return $this->errors;
    }
}
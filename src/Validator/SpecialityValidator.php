<?php

namespace App\Validator;

use Core\Validator\Validator;

class SpecialityValidator extends Validator{

    public function validates(array $data)
    {
        parent::validates($data);
        $this->validate('name', 'minLength', 3);
     
        return $this->errors;
    }
}
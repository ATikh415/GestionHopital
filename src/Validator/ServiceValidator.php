<?php

namespace App\Validator;

use Core\Validator\Validator;

class ServiceValidator extends Validator{

    public function validates(array $data)
    {
        parent::validates($data);
        $this->validate('name_service','minLength', 3);

        return $this->errors;
    }
}
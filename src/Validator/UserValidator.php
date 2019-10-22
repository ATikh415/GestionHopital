<?php

namespace App\Validator;

use Core\Validator\Validator;

class UserValidator extends Validator{

    public function validates(array $data)
    {
        parent::validates($data);
        $this->validate('login','minLength', 3);
        $this->validate('password','minLength', 3);

        return $this->errors;
    }
}
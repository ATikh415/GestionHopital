<?php

namespace App\Validator;

use Core\Validator\Validator;

class DoctorValidator extends Validator{

    public function validates(array $data)
    {
        parent::validates($data);
        $this->validate('name_med','minLength', 3);
        $this->validate('login','minLength', 3);
        $this->validate('addr','alphNum');
        $this->validate('phone', 'phone');

        return $this->errors;
    }
}
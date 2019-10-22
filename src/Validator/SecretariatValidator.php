<?php

namespace App\Validator;

use Core\Validator\Validator;

class SecretariatValidator extends Validator{

    public function validates(array $data)
    {
        parent::validates($data);
        $this->validate('name_sec','minLength', 3);
        $this->validate('login','minLength', 3);
        $this->validate('addr', 'alphNum');
        $this->validate('phone_sec', 'phone');

        return $this->errors;
    }
}
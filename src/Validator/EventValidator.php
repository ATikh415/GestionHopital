<?php

namespace App\Validator;

use Core\Validator\Validator;

class EventValidator extends Validator{

    public function validates(array $data)
    {
        parent::validates($data);
        $this->validate('name', 'minLength', 3);
        $this->validate('date', 'dateDay');
        $this->validate('date', 'dateAfter');

        return $this->errors;
    }
}
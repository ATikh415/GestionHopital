<?php

namespace App\Validator;

use Core\Validator\Validator;

class PlanningValidator extends Validator{

    public function validates(array $data)
    {
        parent::validates($data);
        $this->validate('start', 'time');
        $this->validate('end', 'time');
        $this->validate('date_end', 'date');
        $this->validate('date_start', 'beforeDate', 'date_end');

        return $this->errors;
    }
}
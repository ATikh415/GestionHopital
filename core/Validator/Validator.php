<?php 

namespace Core\Validator;

use DateTime;

class Validator{
    
    private $data;
    protected $errors = [];

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function validates(array $data){
        $this->data = $data;
        $this->errors = [];
        return $this->errors;
    }

    public function validate(string $field, string $method, ...$params): bool
    {
        if(empty($this->data[$field])){
            $this->errors[$field] = "Le champ ne doit pas etre vide";
            return false;
        }else{
            return call_user_func([$this, $method], $field, ...$params);
        }
    }

    public function minLength(string $field, int $lenght): bool
    {
        if(mb_strlen($this->data[$field]) < $lenght){
            $this->errors[$field] = "Le champ doit avoir plus de $lenght caracteres";
            return false;
        }
        return true;
    }

    public function date($field): bool
    {
        if(DateTime::createFromFormat('Y-m-d', $this->data[$field]) === false){
            $this->errors[$field] = "La date {$this->data[$field]} est invalide, recommencer";
            return false;
        }
        return true;
    }

    public function dateDay($field){
        if($this->date($field)){
            $day = strftime('%A', strtotime($this->data[$field]));
            if($day == 'Sunday' || $day == 'Saturday'){
                $this->errors[$field] = "Les samedis et dimanches sont exclus, recommencer";
                return false;
            }
            return true;
        }
        return false;
    }

    public function time($field): bool
    {
        if(DateTime::createFromFormat('H:i', $this->data[$field]) === false){
            $this->errors[$field] = "La temps {$this->data[$field]} est invalide, recommencer";
            return false;
        }
        return true;
    }

    public function beforeTime($startField, $endField): bool{
        if($this->time($startField)  && $this->time($endField)){
            $start =DateTime::createFromFormat('H:i', $this->data[$startField]);
            $end =DateTime::createFromFormat('H:i', $this->data[$endField]);
            if($start->getTimestamp() > $end->getTimestamp()){
                $this->errors[$startField] = "L'heure de debut doit etre inferieur a l'heure de fin";
                return false;
            }
            if(($end->format('i') - $start->format('i')) > 15){
                $this->errors[$startField] = "Le rendz-vous ne peut pas duree plus de 15mn";
                return false;
            }
            $st = intval($start->format('Y-m-d'));
            $e = intval($end->format('H'));
            if($st < 12 || $e > 15 ){
                $this->errors[$startField] = "L'heure de rendez-vous est de 08h a 12h et de 15h a 17h";
                return false;
            }

            return true;
        }
        return false;
    }

    public function toNumeric($field){
        if(!is_numeric($this->data[$field])){
            $this->errors[$field] = "Le cin doit numeric";
            return false;
        }
        return true;
    }

    public function alpha($field){
        if(!\preg_match("#^[a-zA-Z ]*$#", $this->data[$field])){
            $this->errors[$field] = "Le champs doit comporter que de lettre alphabetique";
            return false;
        }
        return true;
    }

    public function phone($field){
        if(!\preg_match('#^(7)[0678][ ]([0-9]){3}([ ][0-9]{2}){2}$#', $this->data[$field])){
            $this->errors[$field] = "Le numero doit commemcer par 70 ou 76 ou 77 ou 78 au format : 77 102 02 02";
            return false;
        }
        return true;
    }

    public function radio($field){
        if(empty($this->data[$field])){
            $this->errors[$field] = "Vous devez choisir le sexe";
            return false;
        }
        return true;
    }

}
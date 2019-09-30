<?php

namespace Core\Form;

use DateTimeInterface;

class Form{

    private $data;
    private $errors;

    public function __construct($data, $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input(string $key, string $label, string $type, ?string $placeholde = null){
        $value = $this->getValue($key);

        return <<<HTML
        <div class="col-sm-6">
            <div class="form-group">
                <label for="field{$key}">{$label}</label>
                <input type="{$type}" name="{$key}" id="field{$key}" value="{$value}" class="{$this->getInputClass($key)}" placeholder = "$placeholde">
                {$this->getErrorClass($key)}
            </div>
        </div>
HTML;

    }

    public function select(string $key, string $label, $options = null ){
        $optionHTML = [];
        $value = $this->getValue($key);

        foreach($options as $k => $v){
            $selected = in_array($k, $value) ? " selected" : "";
             $optionHTML[] = "<option value=\"$k\" $selected>$v</option>";     
        }
        $optionHTML = implode('', $optionHTML);
        

        return <<<HTML
        <div class="form-group">
            <label for="field{$key}">$label</label>
            <select id="field{$key}" class="{$this->getInputClass($key)}" name="{$key}[]" multiple> {$optionHTML}</select>
            {$this->getErrorClass($key)}
        </div>
HTML;
    }

    public function getValue(string $key){
        if(is_array($this->data)){
            return $this->data[$key] ?? null;
        }
        $method = 'get' . str_replace(' ', '', ucwords(str_replace('_',' ', $key)));
        $value = $this->data->$method();
        if($value instanceof DateTimeInterface){
            return $value->format('Y-m-d H:i:s');
        }
        return $value;
    }

    public function getInputClass($key): string
    {
        $class = 'form-control';
        if(isset($this->errors[$key])){
            $class .= ' is-invalid';
        }
        return $class;
    }

    public function getErrorClass($key): ?string
    {
        if(isset($this->errors[$key])){
            if(\is_array($this->errors)){
                $error = implode('<br>', $this->errors[$key]);
            }else{
                $error = $this->errors[$key];
            }
            $invalidFeedBack = '<div class="invalid-feedback">' . $error . '</div>';
            return $invalidFeedBack;
        }
        return null;
    }

}
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

    public function input(string $key, string $label, string $type, ?string $icone = null){
        $value = $this->getValue($key);

        return <<<HTML
                 <div class="input-field col s6">
                    {$icone}
                    <label for="field_{$key}">{$label}</label>
                    <input type="{$type}" name="{$key}" id="field_{$key}" value="{$value}" class="{$this->getInputClass($key)}" >
                    {$this->getErrorClass($key)}
                </div>
HTML;

    }

    public function radio(string $key, string $label, $val){
        $value = $this->getValue($key);

        $checked = $value == $val ? ' checked' : "";

        return <<<HTML
            <label for="field{$val}" >
                <input type="radio" name="{$key}" id="field{$val}" value="{$val}" $checked>
                <span>{$label}</span>
            </label>
            {$this->getErrorClass($key)}
HTML;

    }

    public function select(string $key, string $label, $options = null ){
        $optionHTML = [];
        $value = $this->getValue($key);

        foreach($options as $k => $v){
            $selected = $value == $k ? " selected" : "";
             $optionHTML[] = "<option value=\"$k\" $selected>$v</option>";     
        }
        $optionHTML = implode('', $optionHTML);
        

        return <<<HTML
        <div class="input-field col s6">
            <select id="field_{$key}" class="{$this->getInputClass($key)}" name="{$key}"> {$optionHTML}</select>
            <label for="field_{$key}">$label</label>
            {$this->getErrorClass($key)}
        </div>
HTML;
    }


    public function textarea(string $key, string $label){
        $value = $this->getValue($key);
     
        return <<<HTML
        <div class="form-group">
            <label for="field_{$key}">$label</label>
            <textarea id="field_{$key}" class="{$this->getInputClass($key)}" type="text" name="{$key}"> {$value}</textarea>
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
            return $value->format('Y-m-d');
        }
        return $value;
    }

    public function getInputClass($key): string
    {
        $class = 'validate';
        if(isset($this->errors[$key])){
            $class .= ' is-invalid';
        }
        return $class;
    }

    public function getErrorClass($key): ?string
    {
        if(isset($this->errors[$key])){
            if(\is_array($this->errors[$key])){
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
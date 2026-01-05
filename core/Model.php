<?php

namespace SimpleFramework;

use Valitron\Validator;

class Model
{
    protected array $fillable = [];
    public array $attributes = [];

    protected string $name_lang = 'ru';

    protected array $rules = [];
    protected array $errors =[];

    protected array $labels = [];

    public function loadData():void
    {
        $data = request()->getData();

        foreach($this->fillable as $field){
            if(isset($data[$field]))
            {
                $this->attributes[$field] = $data[$field];
            }else{
                $this->attributes[$field] = '';
            }
        }
    }

    public function validate($data = '', $rules = '', $labels = '', $name_lang = ''):bool
    {
        if(!$data){
            $data = $this->attributes;
        }
        if(!$rules)
        {
            $rules = $this->rules;
        }
        if(!$name_lang)
        {
            $name_lang = $this->name_lang;
        }
        if(!$labels)
        {
            $labels = $this->labels;
        }

        Validator::langDir(WWW."/lang");
        Validator::lang($name_lang);

        $validator = new Validator($data);
        $validator->rules($rules);
        $validator->labels($labels);
        if($validator->validate()){
            return true;
        }else{
            $this->errors = $validator->errors();
            return false;
        }
    }

    public function getErrors():array
    {
        return $this->errors;
    }
}
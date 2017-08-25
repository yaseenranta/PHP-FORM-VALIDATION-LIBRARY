<?php

class formValidation
{
    public $isform;
    public $errors = [];
    private $formData = [];


    public function __construct(){

        switch($_SERVER['REQUEST_METHOD']):
            case 'GET':
                $this->get();
                break;
            case 'POST':
                $this->post();
                break;
        endswitch;
    }

    private function post($arg = ''){
        $post = $_POST;
        $this->userInput($post);
        $this->formData = (!empty($arg) && !empty($post)) ? $post[$arg] : $post;
    }

    private function get($arg = ''){
        $get = $_GET;
        $this->userInput($get);
        $this->formData =  (!empty($arg) && !empty($get)) ? $get[$arg] : $get;
    }

    public function input($fieldname = ''){
        if(empty($fieldname)):
            return $this->formData;
        else:
            if(array_key_exists($fieldname,$this->formData)):
                return $this->formData[$fieldname];
            else:
                return '';
            endif;
        endif;
    }

    private function userInput($data){
        $arg = [];
        // clean user input logic here
        foreach($data as $k => $val):
            $val = trim($val);
            $val = stripslashes($val);
            $val = htmlspecialchars($val);
            $arg[$k] = $val;
        endforeach;
        return $arg;

    }


    public function addRule($fieldNm,$ruleNm){
        if($_SERVER['REQUEST_METHOD'] = 'post' && empty($this->formData) ){
            $this->isform = true;
            return $this;
        }

        if(!empty($ruleNm)):
            $validationRules = explode('|',$ruleNm);

            foreach ($validationRules as $validationRule):
                switch ($validationRule):
                    case 'required':
                        $this->required($fieldNm);
                        break;
                    case 'validEmail':
                        $this->validEmail($fieldNm);
                        break;
                endswitch;
            endforeach;
        endif;

    }

    public function isFailed(){
        $isFail = $this->isform;
        return $isFail;
    }

    //validation rules.
    private function required($fieldName){
        $field = $this->input($fieldName);
        if(empty($field)):
            $this->errors[$fieldName][] = "The $fieldName is required";
            $this->isform = true;
        endif;
    }

    private function validEmail($fieldName){
        $field = $this->input($fieldName);

        if(!filter_var($field, FILTER_VALIDATE_EMAIL)):
            $this->errors[$fieldName][] = 'Email is invalid';
            $this->isform = true;

        endif;
    }

}


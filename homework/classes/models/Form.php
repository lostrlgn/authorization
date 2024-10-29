<?php

class Form
{
    public $textForm = '';

    public static function Begin($attributes = [])
    {
        $form = new self();
        $attrString = $form->toString($attributes);
        $form->textForm .= "<form $attrString>";

        return $form;
    }
    public static function End(){
        echo "</form>";
    }
    public function Input($attributes = []){
        $attrString = $this->toString($attributes);
        $this->textForm .= "<input $attrString />";
        return $this->textForm;
    }
    public function Textarea($attributes = []){
        $attrString = $this->toString($attributes);
        $this->textForm .= "<textarea $attrString></textarea>";
        return $this->textForm;
    }
    public function Password($attributes = []){
        $attributes['type'] = 'password';
        $attrString = $this->toString($attributes);
        $this->textForm .= "<input $attrString />";
        return $this->textForm;
    }
    public function Submit($attributes = []){
        $attributes['type'] = 'submit';
        $attrString = $this->toString($attributes);
        $this->textForm .= "<input $attrString />";
        return $this->textForm;
    }

    
    private function toString($attributes = [])
    {
        $attrString = '';
        foreach($attributes as $attribute => $val) {
            $attrString .= "$attribute=\"$val\"";
        }
        return $attrString;
    }
}

$form = Form::Begin([
    'id' => 'form_id',
    'action' => 'file_name.php',
    'method' => 'post'
]);
$form->input(['type' => 'text', 'name' => 'login']); 
$form->password(['name' => 'password', 'placeholder' =>
'пароль']);
$form->submit(['name' => 'btn_send', 'value' =>
'Отправить форму']); 
Form::end();

var_dump($form);
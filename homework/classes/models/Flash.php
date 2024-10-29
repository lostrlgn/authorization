<?php

class Flash
{
    private const MESSAGE_TEXT = 'flash_message';

    public static function setMessage( $value){
        Session::set(self::MESSAGE_TEXT, $value);
    }
    public static function getMessage(){
        $message = Session::get(self::MESSAGE_TEXT);
        Session::del(self::MESSAGE_TEXT);
        return $message;
        
    }
}

Session::start();
Flash::setMessage('Форма успешно отправлена!');
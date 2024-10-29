<?php

class Session 
{
    public static function start()
    {
        return session_start();
    }
    public static function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }
    public static function get($name)
    {
        return self::isExist($name) ? $_SESSION[$name] : "session $name doesnt exist";
    }
    public static function del($name)
    {
        if (self::isExist($name))  
        {
            unset($_SESSION[$name]);
            return "session $name was deleted";
        }
        return "session $name doesnt exist";

    }
    public static function isExist($name)
    {
        return isset($_SESSION[$name]);
    }

}

Session::start();
echo Session::set('user', [2, 3, 4]);
var_dump(Session::get('user'));
var_dump(Session::del('user'));
<?php

class Cookie 
{
    public static function set($name, $value)
    {
        setcookie($name, $value, 3600);
        $_COOKIE[$name] = $value;
    }
    public static function get($name)
    {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : "cookie $name doesnt exist";
    }
    public static function del($name)
    {
        if (isset($_COOKIE[$name])) {
            setcookie($name, '', time() - 1);
            unset($_COOKIE[$name]); 
            return "$name was deleted";
        } else {
            return "$name cookie doesnt exist";
        }


    }
}

Cookie::set('k', 34);
echo Cookie::get('k');
Cookie::del('k');





// class Cookie 
// {
//     private $cookie = [];
//     public function setCookie($name, $value)
//     {
//         setcookie($name, $value, 3600);
//         $_COOKIE['name'] = $value;
//         $this->cookie[] = [$name => $value];
//     }
//     public function getCookie($name)
//     {
//         return "";
//     }
//     public function delCookie($name)
//     {
//         setcookie($this->cookie[$name], '', 3600);

//     }
// }

// $token = new Cookie;

// $token->setCookie('user', '234');
// $token->getCookie('user');
// $token->setCookie('user', '234');
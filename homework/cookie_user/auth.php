<?php

require_once 'function.php';

$result = false;
$token = isset($_COOKIE['token']) ? $_COOKIE['token'] : null;


if ($token && ($data = $file_load())) {

    if ($user = $user_search($data, $token)) {

        $user_data = ['login' => array_keys($user)[0], 'age' =>  $user[array_keys($user)[0]]['age']];


        setcookie('user_info', json_encode($user_data, time() + TIME_EXPIRE));

        setcookie('user_info', serialize($user_data), time() + TIME_EXPIRE, '/');
        
        $cookie_value = serialize(['user_info' => json_encode($user_data)]);

        setcookie('user_info', $cookie_value, time() + TIME_EXPIRE, '/');

        
        $_COOKIE['user_info'] = json_encode(['login' => array_keys($user)[0], 'age' =>  $user[array_keys($user)[0]]['age']]);
    
    } else {
        header('Location: ' . SCRIPT_FILE);
        exit;
    }

    if (isset($_COOKIE['user_info'])) {
        $user_info = json_decode($_COOKIE['user_info'], true);
    
        // $user_info = unserialize($_COOKIE['user_info']);

        $result = array_values($user_info); 
    }
}

return $result;

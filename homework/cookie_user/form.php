<?php
require_once 'config.php';
require_once 'function.php';
$result = null;

    // register
if (isset($_POST['send'])) { 
    $result = $register();
    // setcookie('token',  bin2hex(random_bytes(25)), time() + TIME_EXPIRE);
    // setcookie('user_info', json_encode(['login' => $_POST['login'], 'token' => $_COOKIE['token']]), time() + TIME_EXPIRE);

}

if (isset($_POST['signin'])) {
    
    if (isset($_POST['login']) && isset($_POST['password'])) {        
        $result = $sign_in($_POST['login'], $_POST['password']);               
    }            
}


if (isset($_POST['logout'])) {
    setcookie('token', '', time()-1);
    setcookie('user_info', '', time()-1);
    unset($_COOKIE['token']);
    unset($_COOKIE['user_info']);
    isset($_POST['token']) && $logout($_POST['token']);    
}

header('Location: ' . SCRIPT_FILE 
                    . ($result ? '?' . $result : '') 
);
exit;

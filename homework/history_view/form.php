<?php
require_once 'config.php';
require_once 'function.php';
$result = null;
$user_info = null;

if (isset($_POST['send'])) { 
    $result = $register();
}

if (isset($_POST['signin'])) {
    if (isset($_POST['login']) && isset($_POST['password'])) {        
        $result = $sign_in($_POST['login'], $_POST['password']);  
        if (strpos($result, 'token=') !== false) {
            $user_info = json_decode($result, true);
            $_SESSION['user_info'] = ['token' => $user_info['token'], 'login' => $_POST['login']];
        }               
    }            
}

if (isset($_POST['logout'])) {
    unset($_SESSION['user_info']);
}

header('Location: ' . SCRIPT_FILE . ($result ? '?' . $result : ''));
exit;

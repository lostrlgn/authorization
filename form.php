<?php
require_once 'config.php';
require_once 'function.php';
$result = null;

    // register
if (isset($_GET['send'])) { 
    $result = $register();
}

if (isset($_GET['signin'])) {
    if (isset($_GET['login']) && isset($_GET['password'])) {        
        $result = $sign_in($_GET['login'], $_GET['password']);               
    }            
}


if (isset($_GET['logout'])) {
    $token && $logout($token);    
}

header('Location: ' . SCRIPT_FILE 
                    . ($result ? '?' . $result : '') 
);
exit;

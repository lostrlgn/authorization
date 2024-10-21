<?php
require_once 'config.php';
require_once 'function.php';
$result = null;

    // register
if (isset($_POST['send'])) { 
    $result = $register();
}

if (isset($_POST['signin'])) {
    if (isset($_POST['login']) && isset($_POST['password'])) {        
        $result = $sign_in($_POST['login'], $_POST['password']);               
    }            
}


if (isset($_POST['logout'])) {
    isset($_POST['token']) && $logout($_POST['token']);    
}

header('Location: ' . SCRIPT_FILE 
                    . ($result ? '?' . $result : '') 
);
exit;

<?php

require_once 'function.php';

$result = false;
$token = isset($_GET['token']) ? $_GET['token'] : null;



if ($token && ($data = $file_load())) {
    // var_dump($user_search($data, $token)); 
    // die;
    if ($user = $user_search($data, $token)) {
        $result = array_keys($user)[0];
    } else {
        header('Location: ' . SCRIPT_FILE);
        exit;
    }
}

return $result;

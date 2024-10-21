<?php

require_once 'function.php';

$result = false;
$token = isset($_GET['token']) ? $_GET['token'] : null;



if ($token && ($data = $file_load())) {

    if ($user = $user_search($data, $token)) {
        // $result = array_merge(array_keys($user), $user[array_keys($user)[0]]);
        $result =  array_keys($user);
        var_dump($result);
        die;
    } else {
        header('Location: ' . SCRIPT_FILE);
        exit;
    }
}

return $result;

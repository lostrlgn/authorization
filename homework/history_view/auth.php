<?php
require_once 'function.php';

$result = false;

if (isset($_SESSION['user_info'])) {
    $user_info = $_SESSION['user_info'];
    $token = $user_info['token'];

    if ($token && ($data = $file_load())) {
        if ($user = $user_search($data, $token)) {
            $result = array_keys($user)[0];
        } else {
            header('Location: ' . SCRIPT_FILE);
            exit;
        }
    }
}

return $result;




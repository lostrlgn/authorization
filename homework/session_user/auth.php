<?php

require_once 'function.php';

$result = [];
$token = isset($_COOKIE['token']) ? $_COOKIE['token'] : null;


if (isset($_SESSION['user'])) {
    $result = $_SESSION['user']; 

}


return $result;

<?php

require_once 'function.php';

$result = [];
$token = isset($_COOKIE['token']) ? $_COOKIE['token'] : null;


if (isset($_SESSION['user'])) {
    $result = $_SESSION['user']; 
    // var_dump($result['image']);
    // var_dump($_FILES['file']['tmp_name']);
    // die; 

}


return $result;

<?php
session_start();

if (!isset($_SESSION['correct_num'])) {
    $getNum = function($min, $max) {
        return random_int($min, $max);
    };

    $randomNumber = $getNum(1, 100);
    $_SESSION['correct_num'] = $randomNumber;
}


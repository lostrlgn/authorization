<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['number'])) {
        $_SESSION['number'] = $_POST['number'];

        if ($_SESSION['number'] == $_SESSION['correct_num']) {
            $message = 'Вы угадали число!';
        } else {
            $message = 'Вы не угадали число! Правильный ответ: ' . $_SESSION['correct_num'];
        }
        echo $message;
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header("Location: form.php");  
        exit();
    }
}

require_once 'form.php';

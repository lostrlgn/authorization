<?php   
    // session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['sign-in'])) {
            // var_dump($_SESSION); die;
            $_SESSION['login'] = $_POST['login'];

            // setcookie('login', $_POST['login'], time()+10);
        }
        
        if (isset($_POST['logout'])) {
            // setcookie('login', '', time()-1);
            // setcookie('login', '');
            // unset($_SESSION['login']);
            session_destroy();
        }       

        header('Location: ' . $_SERVER['SCRIPT_NAME']);
        exit;
    }


    $_SESSION['data'] = [1, 2, 3,4];
    $_SESSION['key'] = 3;
    $_SESSION['data'][] = 5;
    $_SESSION['data'][] = ['user' => [
        'login' => 'Vasya',
    ]];

    var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="3"> -->
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <?php if (! isset($_SESSION['login'])): ?>
            <div>login: <input type="text" name="login"></div>
            <div><input type="submit" name='sign-in' value='Вход'></div>
        <?php else: ?>
            <div>Hello: <?= $_SESSION['login'] ?></div>
            <div><input type="submit" name='logout' value='Выход'></div>
        <?php endif ?>
    </form>
</body>
</html>
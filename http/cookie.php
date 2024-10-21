
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['sign-in'])) {
            setcookie('login', $_POST['login'], time()+100000);
        }
        
        if (isset($_POST['logout'])) {
            // setcookie('login', '', time()-1);
            setcookie('login', '');
        }       

        header('Location: ' . $_SERVER['SCRIPT_NAME']);
        exit;
    }

    // var_dump($_COOKIE);
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
        <?php if (! isset($_COOKIE['login'])): ?>
            <div>login: <input type="text" name="login"></div>
            <div><input type="submit" name='sign-in' value='Вход'></div>
        <?php else: ?>
            <div>Hello: <?= $_COOKIE['login'] ?></div>
            <div><input type="submit" name='logout' value='Выход'></div>
        <?php endif ?>
    </form>
</body>
</html>


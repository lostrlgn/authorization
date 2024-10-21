<?php
    require_once 'config.php';    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

    <?php if (!$auth && !$reg && !$signin): ?>
        <div>
            <a href="<?= SCRIPT_FILE ?>?register">Регистрация</a>
        </div>
        <div>
            <a href="<?= SCRIPT_FILE ?>?sign-in">Авторизация</a>
        </div>
    <?php endif ?>
    
    <?php if ($auth || $reg || $signin): ?>
        <form action="<?= FORM_FILE ?>" method="post" enctype="multipart/form-data">
            <?php if ($reg || $signin): ?>
                <div>
                    <label>
                        Login:    
                        <input type="text" name='login'>
                    </label>
                </div>
                <div>
                    <label>
                        Password:    
                        <input type="text" name="password">
                    </label>
                </div>
                <?php if ($reg):?>
                    <div>
                        <label>
                            Age:    
                            <input type="text" name="age">
                        </label>
                    </div>
                    <label>
                        file:    
                        <input type="file" name="file">
                    </label>
                <?php endif ?>
            <?php endif ?>
            <div>
                <?php 
                    if ($auth) {
                        $btn = 'Logout';
                        $name = 'logout';
                    } 
                    if ($reg) {
                        $btn = 'Register';
                        $name = 'send';
                    }
                    if ($signin) {
                        $btn = 'Sign in';
                        $name = 'signin';
                    }
                ?>
                <button 
                    type="submit"
                    name="<?= $name ?>"
                >
                    <?= $btn ?>
                </button>
            </div>
        </form>
        
        <div><a href="<?= SCRIPT_FILE ?>">Main</a></div>
    <?php endif ?>
    <div>
        <?= $error ?>
        <div class="login">
            <img src="<?= $auth['image'] ? $auth['image'] : '' ?>" alt="Аватарка пользователя">
            <?= $auth ? 'user: ' . $auth['login'] : '' ?>
        </div>
        <div class="age">
            <?= $auth ? 'age: ' . $auth['age'] : '' ?>
        </div>
        <br>
        <br>

    </div>
</body>
</html>
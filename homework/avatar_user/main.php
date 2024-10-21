<?php
    require_once 'config.php';   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <form action="<?= FORM_FILE ?>" method="post"  enctype="multipart/form-data">
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
                <div>
                <label>
                    Заргрузить аватарку:    
                    <input type="file" name="file">
                </label>
        </div>
            <?php endif ?>
            
            <?php if ($auth): ?>
                <input type="hidden" name='token' value="<?= $token ?>">
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
        <h3>Пользователь: <?= $auth[0] ?></h3>
        <img src="<?= $auth['image'] ?>" alt="Аватарка пользователя" style="width: 150px; height: 150px; border-radius: 50%;">
    </div>
</body>
</html>
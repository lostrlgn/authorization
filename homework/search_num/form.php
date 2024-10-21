<?php
require_once 'random.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Угадай число</title>
</head>
<body>
    <form action="session.php" method="post">
        <?php if (!isset($_POST['number'])) : ?>
            <div>
                <label>
                    Угадай число:    
                    <input type="text" name='number'>
                </label>
            </div>
            <button type="submit" name="send">Отправить</button>
        <?php else : ?>
            <button type="submit" name="logout">Попробовать снова</button>
        <?php endif ?>
    </form>
</body>
</html>
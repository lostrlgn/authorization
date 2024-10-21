<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {        
        $uploadfile = 'uploads/' 
            . time() 
            . '_' 
            . bin2hex(random_bytes(25))
            . '.'
            . pathinfo($_FILES['file']['name'])['extension']
            ;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
            echo "Файл не содержит ошибок и успешно загрузился на сервер.\n";
        } else {
            echo "Возможная атака на сервер через загрузку файла!\n";
        }
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">            
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
            file:    
            <input type="file" name="file">
        </label>
    </div>         
       
    <button type="submit" name="btn">Button</button>
</form>
</body>
</html>
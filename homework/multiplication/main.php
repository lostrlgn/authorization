<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>

    
    
</head>
<body>

<div class="main-container">


 



    
    <div class="container">
        <?
        include_once('functions.php');
        Mult(1);
        ?>

    </div>

    <div class="container">
        <?  
        Mult(2);
        ?>

    </div>

    <div class="container">
        <?
        Mult(3);
        ?>
    </div>

    <div class="container">
        <?
        Mult(4);
        ?>
    </div>

    <div class="container">
        <?
        Mult(5);
        ?>
    </div>

    <div class="container">
        <?
        Mult(6);
        ?>
    </div>

    <div class="container">
        <?
        Mult(7);
        ?>
    </div>

    <div class="container">
        <?
        Mult(8);
        ?>
    </div>

    <div class="container">
        <?
        Mult(9);
        ?>
    </div>
 </div>  


    <style>

        .main-container{
            display: flex;
            flex-direction: row;
        }
        
        .container{    
            margin: 20px;
        }
    </style>   
</body>


</html>
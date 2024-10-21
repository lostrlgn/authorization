<?

function Mult($num){
    for ($i=1; $i<10; $i++){
        $a = $num * $i;
        echo Ishref($num) . " * " .  Ishref($i) . " = "  . Ishref($a) . "<br>";
    }
}

function Ishref($num){
    $newnum = $num;
    if($num >1 & $num <10 & $_SERVER['SCRIPT_NAME'] != "/multiplication/number.php" ){
        $newnum = "<a href = 'number.php?num=$num'> $num</a>";
    }

    return $newnum;

}





?>

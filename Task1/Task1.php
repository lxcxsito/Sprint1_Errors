<?php

//Task 1
try{
    $result = Dividir(10, 0);
    echo $result;
}
catch(Exception $e){
    echo $e->getMessage();
}
function Dividir($a, $b)
{
        if ($b == 0) throw new Exception("No es pot dividir per 0" . "\n");
        return $a / $b;
}




?>
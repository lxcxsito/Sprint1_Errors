<?php

//Task 1
Dividir(10, 0);
function Dividir($a, $b)
{
    try {
        if ($b == 0) {
            echo throw new ErrorException("No es pot dividir per 0" . "\n");
        }
        return $a / $b;
    } catch (Exception $e) {
        echo $e . "\n";
        return $e->getMessage();
    }

}

?>
<?php

//Task 1
echo Dividir(10, 0);
function Dividir($a, $b)
{
    try {
        if ($b == 0) {
            throw new Exception("No es pot dividir per 0" . "\n");
        }
        return $a / $b;
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }

}

?>